
<head>
    <link rel="stylesheet" href="rdv/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
	<link rel="stylesheet" href="rdv/css/style.css">
	<title>Laboratoire - AIN ITTI</title>

</head>

    <div class="main-content">
        <div class="wrapper" style="background-color: #00a3c8 !important">
			<form action="/postappointment"  method="post" id="wizard">
				@csrf
                <h2></h2>
                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="rdv/images/coronavirus.jpg" alt="">
						</div>
						<div class="form-content" >
							<div class="form-header">
								<h3>Prendre rendez-vous</h3>
							</div>
                            @if(session('success'))
							<div class="form-row" style="display: flow-root; background-color :#d4edda  ; padding:10px ; border-radius: 9px;">
								<div class="alert alert-danger text-center" role="alert" style="color:#155724">
									Votre rendez-vous est confirmé au niveau du notre laboratoire. <br>
									Vous pouvez modifier votre rendez-vous en suivant le lien envoyé dans votre boite mail.<br>
                                    Si vous n'avez pas reçu votre e-mail veuillez vérifier votre spam.
                                </div>
							</div>
							@endif
							@if(count($errors))
                                <div class="alert alert-danger text-center" role="alert" style="color:red">
                                    Un ou plusieurs champs contiennent une erreur. Veuillez vérifier et essayer à nouveau.
                                </div>
                            @endif
							<div class="form-row">
								<div class="form-holder">
									Nom
									<input type="text" placeholder="Nom" name="last_name" class="form-control" required value="{{Request::old('last_name')}}">
								</div>
								<div class="form-holder">
									Prénom
									<input type="text" placeholder="Prénom" name="first_name" class="form-control" required value="{{Request::old('first_name')}}" >
								</div>
							</div>

							<div class="form-row">
								<div class="form-holder w-100">
									Date de naissance
									<input type="date"  name="date" class="form-control" required value="{{Request::old('date')}}" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100" style="align-self: flex-end; transform: translateY(4px);">
									Sexe
									<div class="checkbox-tick">
										<label class="male">
											<input type="radio" name="sexe" value="m" required>M<br>
											<span class="checkmark"></span>
										</label>
										<label class="female">
											<input type="radio" name="sexe" value="f" required>F<br>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>

						</div>
					</div>
                </section>
                <h2></h2>
                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="rdv/images/coronavirus.jpg" alt="">
						</div>
						<div class="form-content">
							<div class="form-header">
								<h3>Prendre rendez-vous</h3>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									Adresse
									<input type="text" name="adresse"  placeholder="Adresse" class="form-control" required value="{{Request::old('adresse')}}" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									Numéro téléphone
									<input type="text" name="tel" placeholder="Numéro téléphone" class="form-control" required value="{{Request::old('tel')}}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									Email
									<input type="text" name="mail" placeholder="Email" class="form-control" required value="{{Request::old('mail')}}" >
								</div>
							</div>
						</div>
					</div>
                </section>
                <h2></h2>
                <section>
                    <div class="inner">
						<div class="image-holder">
							<img src="rdv/images/coronavirus.jpg" alt="">
						</div>
						<div class="form-content">
							<div class="form-header">
								<h3>Prendre rendez-vous</h3>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									CIN/Passeport
									<input type="text" name="cin" placeholder="CIN/Passport" class="form-control" required value="{{Request::old('cin')}}" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									Date de prélèvement
									<input type="datetime-local" name="date_test" min='{{date("Y-m-d")}}T10:00' placeholder="Date de prélèvement" class="form-control" required value="{{Request::old('date_test')}}" >
								</div>
							</div>
						</div>
					</div>
				</section>
            </form>
		</div>
    </div>


    <script src="rdv/js/jquery-3.3.1.min.js"></script>
    <script src="rdv/js/jquery.steps.js"></script>
	<script src="rdv/js/main.js"></script>

	<script>
var form = document.getElementById("wizard");
$(document).ready(function(){
	$('a[href*="#finish"]').click(function(){
  			form.submit();
	});
});
	</script>
