<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Liste des patients</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <button type="button" class="btn btn-primary" @click="newModal()">Ajouter un nouveau patient</button>
                                <div
                                    class="modal fade"
                                    id="exampleModalLong"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle" v-show="this.editmode">
                                                        Modifier le patient
                                                    <br/>
                                                </h5>
                                                <h5 class="modal-title" id="exampleModalLongTitle" v-show="!this.editmode">
                                                        Créer un nouveau patient
                                                    <br/>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="editmode ? updateAccount() : createAccount()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Nom</label>
                                                            <input v-model="form.last_name" type="text" name="last_name" class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }"/>
                                                            <has-error :form="form" field="last_name"></has-error>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Prénom</label>
                                                            <input type="text" name="first_name" id
                                                                cols
                                                                rows="6"
                                                                class="form-control"
                                                                v-model="form.first_name"
                                                                :class="{ 'is-invalid': form.errors.has('first_name') }">
                                                            <has-error :form="form" field="first_name"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleFormControlSelect1">Sexe</label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="sexe" v-model="form.sexe" :class="{ 'is-invalid': form.errors.has('sexe') }">
                                                                <option>M</option>
                                                                <option>F</option>
                                                            </select>
                                                            <has-error :form="form" field="sexe"></has-error>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Date naissance</label>
                                                            <input type="date" name="date"
                                                                id
                                                                cols
                                                                rows="6"
                                                                class="form-control"
                                                                v-model="form.date"
                                                                :class="{ 'is-invalid': form.errors.has('date') }">
                                                            <has-error :form="form" field="date"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>CIN/Passeport</label>
                                                            <input type="text" name="cin"
                                                                id
                                                                cols
                                                                rows="6"
                                                                class="form-control"
                                                                v-model="form.cin"
                                                                :class="{ 'is-invalid': form.errors.has('cin') }">
                                                            <has-error :form="form" field="cin"></has-error>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Numéro téléphone</label>
                                                            <input type="text" name="tel"
                                                                id
                                                                cols
                                                                rows="6"
                                                                class="form-control"
                                                                v-model="form.tel"
                                                                :class="{ 'is-invalid': form.errors.has('tel') }">
                                                            <has-error :form="form" field="tel"></has-error>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Adresse</label>
                                                        <textarea class="form-control" name="adresse" id="exampleFormControlTextarea1" rows="2" v-model="form.adresse" :class="{ 'is-invalid': form.errors.has('adresse') }"></textarea>
                                                        <has-error :form="form" field="adresse"></has-error>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="mail" name="mail"
                                                               id
                                                               cols
                                                               rows="6"
                                                               class="form-control"
                                                               v-model="form.mail"
                                                               :class="{ 'is-invalid': form.errors.has('mail') }">
                                                        <has-error :form="form" field="mail"></has-error>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Lieu de prélèvement</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="pos" v-model="form.pos" type="radio"  id="inlineRadio1" value="au laboratoire" :class="{ 'is-invalid': form.errors.has('pos') }">
                                                                <label class="form-check-label" for="inlineRadio1">Prélèvement au laboratoire</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="pos" v-model="form.pos" type="radio"  id="inlineRadio2" value="Sur site" :class="{ 'is-invalid': form.errors.has('pos') }">
                                                                <label class="form-check-label" for="inlineRadio2">Sur site</label>
                                                            </div>
                                                            <has-error :form="form" field="pos"></has-error>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Type de patient</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="patient_type" v-model="form.patient_type" type="radio"  id="inlineRadio3" value="employé" :class="{ 'is-invalid': form.errors.has('patient_type') }">
                                                                <label class="form-check-label" for="inlineRadio3">Employé</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="patient_type" v-model="form.patient_type" type="radio"  id="inlineRadio4" value="invité" :class="{ 'is-invalid': form.errors.has('patient_type') }">
                                                                <label class="form-check-label" for="inlineRadio4">Invité</label>
                                                            </div>
                                                            <has-error :form="form" field="patient_type"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Voyageur</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="voyageur"  @click="ifVoyagef(1)" v-model="form.voyageur" type="radio"  id="inlineRadio11" value="oui" :class="{ 'is-invalid': form.errors.has('voyageur') }">
                                                                <label class="form-check-label" for="inlineRadio11">Oui</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="voyageur" @click="ifVoyagef(0)" v-model="form.voyageur" type="radio"  id="inlineRadio22" value="non" :class="{ 'is-invalid': form.errors.has('voyageur') }">
                                                                <label class="form-check-label" for="inlineRadio22">Non</label>
                                                            </div>
                                                            <has-error :form="form" field="voyageur"></has-error>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Résultat</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="resultat" v-model="form.resultat" type="radio"  id="inlineRadio111" value="fr" :class="{ 'is-invalid': form.errors.has('resultat') }">
                                                                <label class="form-check-label" for="inlineRadio111">Français</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="resultat" v-model="form.resultat" type="radio"  id="inlineRadio222" value="eng" :class="{ 'is-invalid': form.errors.has('resultat') }">
                                                                <label class="form-check-label" for="inlineRadio222">Anglais</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" name="resultat" v-model="form.resultat" type="radio"  id="inlineRadio333" value="esp" :class="{ 'is-invalid': form.errors.has('resultat') }">
                                                                <label class="form-check-label" for="inlineRadio333">Espagnole</label>
                                                            </div>
                                                            <has-error :form="form" field="resultat"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="row" v-show="ifVoyage">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Date de voyage</label>
                                                                <input type="datetime-local" class="form-control" v-model="form.date_voyage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date de prélèvement</label>
                                                               <input type="datetime-local" id="meeting-time"
                                                               class="form-control"
                                                               v-model="form.date_test"
                                                               :class="{ 'is-invalid': form.errors.has('date_test') }" >
                                                               <has-error :form="form" field="date_test"></has-error>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="onClose()">Fermer</button>
                                                    <button v-show="!this.editmode" type="submit" class="btn btn-primary">Sauvegarder</button>
                                                    <button v-show="this.editmode" type="submit" class="btn btn-success">Mise à jour</button>
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
                    <table class="table v-middle">
                        <thead>
                            <tr class="bg-light">
                                <th>Action</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Prénom</th>
                                <th class="border-top-0">Sexe</th>
                                <th class="border-top-0">Date Naissance</th>
                                <th class="border-top-0">CIN/Passeport</th>
                                <th class="border-top-0">Numéro Téléphone</th>
                                <th class="border-top-0">Adresse</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Lieu de prélèvement</th>
                                <th class="border-top-0">Date de prélèvement</th>
                                <th class="border-top-0">Type de patient</th>
                                <th class="border-top-0">Voyageur</th>
                                <th class="border-top-0"> Date voyage</th>
                                <th class="border-top-0">Résultat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in userDatas" :key="user.id" :class="user.status ? 'alert alert-success' : 'alert alert-danger'">
                                <td>
                                    <a @click="editModal(user)" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Éditer">
                                        <i class="fas fas fa-edit" style="color:#3490dc;font-size: 17px"></i>
                                    </a>
                                    <a @click="deleteUserSociete(user.id)" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="supprimer">
                                        <i class="fas fa-trash" style="color:red;font-size:17px"></i>
                                    </a>
                                </td>
                                <td>{{user.last_name}}</td>
                                <td>{{user.first_name}}</td>
                                <td>{{user.sexe}}</td>
                                <td>{{ user.date | moment("DD-MM-YYYY") }}</td>
                                <td>{{user.cin}}</td>
                                <td>0{{user.tel}}</td>
                                <td>{{user.adresse}}</td>
                                <td>{{user.mail}}</td>
                                <td>{{user.pos}}</td>
                                <td><span>{{ user.date_test | moment('DD-MM-YYYY, h:mm') }}</span></td>
                                <td>{{user.patient_type}}</td>
                                <td>{{user.voyageur}}</td>
                                <td>{{user.date_voyage |moment('DD-MM-YYYY, h:mm')}}</td>
                                <td>{{user.resultat}}</td>
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
            this.indexAccountList();
        },

        data() {
            return {
                url: "/url",
                editmode: false,
                ifVoyage: false,
                userDatas: {},
                ifVoyage : null,
                form: new Form({
                    id: "",
                    first_name: "",
                    last_name: "",
                    tel: "",
                    date: "",
                    cin: "",
                    adresse: "",
                    date_test: "",
                    sexe: "",
                    status: "",
                    pos: "",
                    patient_type: "",
                    mail: "",
                    voyageur: "",
                    resultat: "",
                    date_voyage :  "",

                }),
            };
        },

        methods: {
            ifVoyagef(x){
                if(x)
                    this.ifVoyage = true
                else
                    this.ifVoyage = false
            },
            updateAccount() {
                this.$Progress.start();
                this.form
                    .post("/updateAccount/" + this.form.id)
                    .then(() => {
                        this.$Progress.finish();
                        $("#exampleModalLong").modal("hide");
                        Toast.fire({
                            icon: "success",
                            title: "mise à jour réussie"
                        });
                        this.indexAccountList();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            editModal(slider) {
                this.editmode = true;
                this.form.reset();
                $("#exampleModalLong").modal("show");
                this.form.fill(slider);
            },

            newModal() {
                this.editmode = false;
                this.form.reset();
                $("#exampleModalLong").modal("show");
            },

            createAccount() {
                this.$Progress.start();
                this.form
                    .post("createAccount")

                    .then(data => {
                        this.$Progress.finish();
                        $("#exampleModalLong").modal("hide");
                        Toast.fire({
                            icon: "success",
                            title: "Ajouté avec succès"
                        });
                        this.indexAccountList();
                    })
                    .catch(() => {
                    });
            },

            deleteUserSociete(id) {
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
                        this.form.delete("/deleteAccount/" + id);
                    };
                    this.indexAccountList();
                });
            },

            indexAccountList() {
                axios.get("/indexAccountList").then(({ data }) => (this.userDatas = data));
            },
            onClose()
            {
                this.form.reset();
                this.form.errors.clear();
            },


        }
    };

// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );

</script>
<style lang="scss" scoped>
    .inner-wrapper {
        width: 500px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
