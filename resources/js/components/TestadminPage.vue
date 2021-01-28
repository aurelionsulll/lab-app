<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">
                                Liste des rendez-vous
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <vxe-toolbar>
                        <template v-slot:buttons>
                            <vxe-button @click="exportDataEvent"> <i class="fas fa-table"></i> Export en excel</vxe-button>
                            <vxe-input v-model="filterName" type="search" placeholder="chercher" class="float-right"></vxe-input>
                        </template>
                    </vxe-toolbar>
                    <vxe-table
                    :data="list"
                    highlight-hover-row
                    height="500"
                    highlight-hover-column
                    :export-config="{}"
                    ref="xTree"
                    resizable
                    :tree-config="{}"
                    border
                    class="mytable-style"
                    :row-class-name="rowClassName"
                    >
                        <vxe-table-column title="Action" field="status" width="160" sortable>
                            <template v-slot="{ row }">
                                <button v-show="!row.status" class="btn btn-success btn-sm" @click="updateStauts(row.id, 1)">Validation test</button>
                                <button v-show="row.status" class="btn btn-danger btn-sm" @click="updateStauts(row.id, 0)">Dévalidation test</button>
                            </template>
                        </vxe-table-column>
                        <vxe-table-column type="html" width="169" field="last_name" title="Nom" sortable ></vxe-table-column>
                        <vxe-table-column type="html" width="169" field="first_name" title="Prénom" sortable ></vxe-table-column>
                        <vxe-table-column type="html" width="169" field="sexe" title="Sexe" sortable ></vxe-table-column>
                        <vxe-table-column type="html" width="169" field="cin" title="Cin/Passeport" sortable ></vxe-table-column>
                        <vxe-table-column  title="Date Naissancee" field="date" width="169" sortable>
                            <template v-slot="{ row }">
                                <span>{{ row.date | moment("DD-MM-YYYY") }}</span>
                            </template>
                        </vxe-table-column>
                        <vxe-table-column type="html" width="169" field="tel" title="Numéro téléphone" sortable ></vxe-table-column>
                        <vxe-table-column type="html" width="169" field="adresse" title="Adresse" sortable ></vxe-table-column>
                        <vxe-table-column type="html" width="169" field="mail" title="Email" sortable ></vxe-table-column>
                        <vxe-table-column type="html" title="Date de prélèvement" field="date_test" width="189" sortable>
                            <template v-slot="{ row }">
                                <span>{{ row.date_test | moment('DD-MM-YYYY, h:mm') }}</span>
                            </template>
                        </vxe-table-column>
                        <vxe-table-column type="html" title="Date de validation" field="date_v" width="169" sortable>
                            <template v-slot="{ row }">
                                <span v-show="row.date_v != 0">{{row.date_v | moment('DD-MM-YYYY, h:mm')}}</span>
                            </template>
                        </vxe-table-column>

                        <template v-slot:empty>
                            <span style="color: red;">
                            <p>vide</p>
                            </span>
                        </template>
                    </vxe-table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: toast => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });
    export default {
          computed: {
            list () {
              const filterName = XEUtils.toString(this.filterName).trim().toLowerCase()
              if (filterName) {
                const filterRE = new RegExp(filterName, 'gi')
                const searchProps = ['last_name', 'first_name','sexe','cin','date','tel','adresse','mail','date_test']
                const rest = this.userDatas.filter(item => searchProps.some(key => XEUtils.toString(item[key]).toLowerCase().indexOf(filterName) > -1))
                return rest.map(row => {
                  const item = Object.assign({}, row)
                  searchProps.forEach(key => {
                    item[key] = XEUtils.toString(item[key]).replace(filterRE, match => `${match}`)
                  })
                  return item
                })
              }
              return this.userDatas
            }
          },
        created() {
            this.indexAccountList();
            this.indexUserSocieteList();
            this.getDSession();
            this.userDatas = window.MOCK_TREE_DATA_LIST
        },

        data() {
            return {
                session_id : "",
                filterName : "",
                userDatas: [],
                userDatasList: [],
                form: new Form({
                    id: "",
                    first_name: "",
                    last_name: "",
                    tel: "",
                    date: "",
                    cin: "",
                    adresse: "",
                    date_v: "",
                    sexe: "",
                    status: ""
                })
            };
        },

        methods: {
            rowClassName ({ row, rowIndex }) {
              if (row.status) {
                console.log(row.status);
                return 'row-green'
              }
              else
                return 'row-red'
            },
             exportDataEvent () {
              this.$refs.xTree.exportData({ type: 'csv' })
            },
            getDSession()
            {
                axios.get("/getDSession").then(({ data }) => (this.session_id = data));
            },
            updateStauts(id , status) {
                this.$Progress.start();
                this.form.status = status;
                    Swal.fire({
                    title: "Êtes-vous sûr?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Annuler"
                }).then(result => {
                    if (result.value) {
                        this.form.post("/updateStautsApp/"+ id)
                        .then((data) => {
                        this.$Progress.finish();
                        Toast.fire({
                            icon: 'success',
                            title: 'mise à jour réussie'
                        });
                        this.indexAccountList();
                    })
                    .catch(() =>
                    {
                        this.$Progress.fail();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
                        $("#exampleModalLong").modal("hide");
                    });
                    };
                    this.indexAccountList();
                });
            },
            indexAccountList() {
                axios.get("/indexAllAppList").then(({ data }) => (this.userDatas = data));
            },
            indexUserSocieteList() {
                axios.get("/indexUserSocieteList").then(({ data }) => (this.userDatasList = data));
            }
        }
    };
</script>
<style lang="css">
    .inner-wrapper {
        width: 500px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

        .mytable-style .vxe-body--row.row-green {
            color: #1d643b;
            background-color: #d7f3e3;
            border-color: #c7eed8;
        }

        .mytable-style .vxe-body--row.row-red {
            color: #761b18;
            background-color: #f9d6d5;
            border-color: #f7c6c5;
        }
        .mytable-style .vxe-header--column.col-blue {
          background-color: #2db7f5;
          color: #fff;
        }
        .mytable-style .vxe-body--column.col-red {
          background-color: red;
          color: #fff;
        }
        .mytable-style .vxe-body--column.col-orange {
          background-color: #f60;
          color: #fff;
        }
</style>
