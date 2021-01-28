<template>
    <div class="col-12">
        <div class>
            <div class="card-body">
                 <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Modifier vos informations ou supprimer le rendez-vous</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Modifier vos informations
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="updApp()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input v-model="form.last_name" type="text" name="last_name" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input v-model="form.first_name" type="text" name="first_name" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input v-model="form.mail" type="text" name="mail" class="form-control" disabled />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Numéro Téléphone</label>
                                                        <input v-model="form.tel" type="text" name="tel" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sexe</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="sexe" v-model="form.sexe" >
                                                                <option>M</option>
                                                                <option>F</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input v-model="form.date" type="date" name="date" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>CIN/Passeport</label>
                                                        <input v-model="form.cin" type="text" name="cin" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input v-model="form.adresse" type="text" name="adresse" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>date de prélèvement</label>
                                                        <input v-model="form.date_test" type="datetime-local" :min="date" name="date_test" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button
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
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th>Action</th>
                            <th class="border-top-0">Nom</th>
                            <th class="border-top-0">Prénom</th>
                            <th class="border-top-0">Email</th>
                            <th class="border-top-0">Numéro Téléphone</th>
                            <th class="border-top-0" style="width:1000px">Date Naissance</th>
                            <th class="border-top-0">Sexe</th>
                            <th class="border-top-0" style="width:1000px">Adress</th>
                            <th class="border-top-0" style="width:1000px">CIN/Passeport</th>
                            <th class="border-top-0" style="width:1000px">Date de prélèvement</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="slider in datas" :key="slider.id">
                            <th> 
                                <a @click="editModal(slider)" style="cursor: pointer;">
                                    <i class="fas fas fa-edit" style="color:#3490dc;font-size: 17px"></i>
                                </a>
                                <a @click="deleteApp(slider.id)" style="cursor: pointer;">
                                    <i class="fas fa-trash" style="color:red;font-size:17px"></i>
                                </a>
                            </th>
                            <td>{{slider.last_name}}</td>
                            <td>{{slider.first_name}}</td>
                            <td>{{slider.mail}}</td>
                            <td>{{slider.tel}}</td>
                            <td>{{slider.date | moment('DD-MM-YYYY') }}</td>
                            <td>{{slider.sexe}}</td>
                            <td>{{slider.adresse}}</td>
                            <td>{{slider.cin}}</td>
                            <td>{{slider.date_test | moment('DD-MM-YYYY, h:mm') }}</td>

                        </tr>
                        </tbody> 
                    </table>
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
        created() {
            this.indexAppList();
            this.datee();
        },

        data() {
            return {
                datas : {},
                form: new Form({
                    id: "",
                    first_name : "",
                    last_name : "",
                    sexe : "",
                    date : "",
                    tel : "",
                    mail : "",
                    cin : "",
                    adresse : "",
                    date_test : "",
                }),
                date: "",
            };
        },

        methods: {
            updApp() {
                this.$Progress.start();
                this.form
                    .post("/updApp/" + this.form.id)
                    .then(() => {
                        this.$Progress.finish();
                        $("#exampleModalLong").modal("hide");
                        Toast.fire({
                            icon: "success",
                            title: "mise à jour réussie"
                        });
                        this.indexAppList();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            editModal(slider) {
                this.form.reset();
                $("#exampleModalLong").modal("show");
                this.form.fill(slider);
            },


            deleteApp(id) {
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
                        this.form.delete("/deleteApp/" + id);
                        this.indexAppList();
                    }
                });
            },

            indexAppList() {
                axios.get("/indexAppList").then(({ data }) => (this.datas = data));
            },
            datee() {
                axios.get("/date").then(({ data }) => (this.date = data));
            }
        }
    };
</script>
