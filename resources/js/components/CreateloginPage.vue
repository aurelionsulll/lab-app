<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Liste des sociétés</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <button type="button" class="btn btn-primary" @click="newModal()">Ajouter une nouvel société</button>
                                <div
                                    class="modal fade"
                                    id="exampleModalLong"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle" v-show="this.editmode">
                                                    Modifier la société
                                                    <br/>
                                                </h5>
                                                <h5 class="modal-title" id="exampleModalLongTitle" v-show="!this.editmode">
                                                    Créer une société
                                                    <br/>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="editmode ? updateUserSociete() : createUserSociete()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom de société</label>
                                                        <input v-model="form.name" type="text" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"/>
                                                        <has-error :form="form" field="name"></has-error>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email" rows="6" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                                                        <has-error :form="form" field="email"></has-error>
                                                    </div>
                                                    <div class="form-group" v-show="!this.editmode">
                                                        <label>Mot de passe</label>
                                                        <input type="password" name="password" rows="6" class="form-control" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }">
                                                        <has-error :form="form" field="password"></has-error>
                                                    </div>
                                                    <div class="form-group" v-show="!this.editmode">
                                                        <label>Confirmation Mot de passe</label>
                                                        <input type="password" name="password_confirmation" rows="6" class="form-control" v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                                                        <has-error :form="form" field="password_confirmation"></has-error>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="onClose()">Fermer</button>
                                                    <button v-show="!this.editmode" type="submit" class="btn btn-primary">Sauvegarder</button>
                                                    <button
                                                        v-show="this.editmode"
                                                        type="submit"
                                                        class="btn btn-success"
                                                    >Mise à jour</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    border
                    highlight-hover-row
                    class="mytable-scrollbar"
                    height="500"
                    highlight-hover-column
                    :export-config="{}"
                    ref="xTree"
                    resizable
                    :tree-config="{}"
                    >
                    <vxe-table-column  title="Action">
                            <template v-slot="{ row }">
                                <a :href="'/companyUsers/' + row.id" style="font-size:17px;" data-toggle="tooltip" data-placement="top" title="Liste des users" class="text-primary">
                                        <i class="fas fa-list-ul"></i>
                                </a>
                                <a  href="#" class="text-success" style="font-size:17px;" @click="editModal(row)" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a @click="deleteUserSociete(row.id)" style="cursor: pointer;">
                                    <i class="fas fa-trash" style="color:red;font-size:17px"></i>
                                </a>
                                
                            </template>
                        </vxe-table-column>
                        <vxe-table-column type="html" field="name" title="Nom de société" sortable ></vxe-table-column>
                        <vxe-table-column type="html" field="email" title="Email" sortable ></vxe-table-column>
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
                const searchProps = ['name', 'email','password']
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
            this.indexUserSocieteList();
            this.userDatas = window.MOCK_TREE_DATA_LIST;
        },

        data() {
            return {
                filterName: '',
                editmode: false,
                userDatas: [],
                form: new Form({
                    id: "",
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                }),
            };
        },

        methods: {
            exportDataEvent () {
              this.$refs.xTree.exportData({ type: 'csv' })
            },
            updateUserSociete() {
                this.$Progress.start();
                this.form
                    .post("/updateUserSociete/" + this.form.id)
                    .then(() => {
                        this.$Progress.finish();
                        $("#exampleModalLong").modal("hide");
                        Toast.fire({
                            icon: "success",
                            title: "Successfully updated"
                        });
                        this.indexUserSocieteList();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            editModal(slider) {
                this.editmode = true;
                this.form.reset();
                $("#exampleModalLong").modal("show");
                // this.form.fill(slider);
                this.form.id = slider.id;
                this.form.name = slider.name;
                this.form.email = slider.email;
            },

            newModal() {
                this.editmode = false;
                this.form.reset();
                $("#exampleModalLong").modal("show");
            },

            createUserSociete() {
                this.$Progress.start();
                this.form
                    .post("createUserSociete")
                    .then(data => {
                        this.$Progress.finish();
                        $("#exampleModalLong").modal("hide");
                        Toast.fire({
                            icon: "success",
                            title: "Ajouté avec succès"
                        });
                        this.indexUserSocieteList();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            deleteUserSociete(id) {
                Swal.fire({
                    title: "Si vous supprimez cette société, tous les patients sous elle seront supprimés",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui",
                    cancelButtonText: "Annuler"
                }).then(result => {
                    if (result.value) {
                        this.form.delete("/deleteUserSociete/" + id);
                    };
                    this.indexUserSocieteList();
                });
            },
            onClose()
            {
                this.form.reset();
                this.form.errors.clear();
            },
            indexUserSocieteList() {
                axios.get("/indexUserSocieteList").then(({ data }) => {
                    this.userDatas = data;
                    this.list = data; 
                });
            }
        }
    };
</script>
<style lang="scss" scoped>
    .inner-wrapper {
        width: 500px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .keyword-lighten {
          color: #000;
          background-color: #FFFF00;
        }
</style>
