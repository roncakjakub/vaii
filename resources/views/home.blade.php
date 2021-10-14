@extends('templates.default')
@section('content')
    <div class="home">
        <div class="top-banner w-100  text-white">
            <div class="container content pb-5">
                <div class="row">
                    <div class="col-7 fs-24 ff-mrsw ps-3">
                        <h2 class="ff-avnr fw-normal fs-32">
                            Čo ti môžeme ponúknuť?
                        </h2>
                        <ul class=" mb-5">
                            <li><i class="fa fa-check text-orange me-2"></i> Mnohoročné skúsenosti</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Špičkových inštruktorov</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Viac vozidiel k výberu</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Široký výber kurzov</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Vlastné autocvičisko</li>
                        </ul>
                        <p class="fs-32">
                            Prihlás sa ku nám a už ťa <span class="text-orange">žiadna <br>
                            križovatka</span> nevyvedie z miery
                        </p>
                    </div>
                    <div class="col-4 ">
                        <div class="home-form ff-avnr fs-16">
                            <form action="" class="p-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon1"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username"
                                           aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon1"><i
                                                class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email"
                                           aria-label="Email" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon1"><i
                                                class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Telefón"
                                           aria-label="Telefón" aria-describedby="basic-addon1">
                                </div>

                                <div class="row justify-content-center px-5 mx-5">
                                    <button type="button" class="btn bg-red text-white ff-mrsw fs-16">
                                        Odoslať
                                    </button>
                                </div>
                            </form>

                            <div class="bottom p-3 ff-crd">
                                <a href="" class="row align-items-center mb-3">
                                    <div class="col-1"><i class="fas fa-download"></i></div>
                                    <span class="fs-16 col-11">Žiadosť o udelenie vodičského oprávnenia</span>
                                </a>
                                <a href="" class="row align-items-center">
                                    <div class="col-1"><i class="fas fa-download"></i></div>
                                    <span class="fs-16 col-11">Žiadosť o zaevidovanie osoby sediacej na mieste spolujazdca vedľa vodiča</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="how-to-register container ff-crd bg-white fs-16 my-shadow">
            <h1 class="text-red fw-bold fs-24 mb-4">Ako sa prihlásiť?</h1>
            <p>
                Prihlášky si je možné vyzdvihnúť priebežne v piatok od 15 - 17 h alebo v deň začatia kurzu.
            </p>
            <p>
                Zápis do autoškoly na výcvik žiadateľov o vodičské oprávnenie sa uskutočňuje v priestoroch
                autoškoly osobne na ulici Zoltána Kodálya 769/29 v Galante
                (v budove STAVECA) v úradných hodinách alebo na jednotlivých prevádzkach v deň začatia kurzov
                alebo si ich môžete vytlačiť z tejto stránky kliknutím na: prihlasovací formulár .
            </p>
            <p>
                Druhá možnosť je vyplniť predbežnú prihlášku priamo na našej stránke TU online !
            </p>
            <p>
                Na zápis do autoškoly je potrebné priniesť platný občiansky preukaz.
            </p>
            <p class="mb-0">
                Do samotného kurzu môžete byť zaradený (á) až po odovzdaní potvrdeného tlačiva: Doklad o
                zdravotnej spôsobilosti .
                Potrebné tlačivá dostanete pri zápise do kurzu v autoškole alebo ich môžete vytlačiť z tejto
                stránky kliknutím na: žiadosť o udelenie vodičského oprávnenia . (Pozor! – tlačivo je potrebné
                vytlačiť obojstranne a dať potvrdiť obvodnému lekárovi)
            </p>
        </div>
    </div>
@endsection
