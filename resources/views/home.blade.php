@extends('templates.default')
@section('content')
    <div class="home">
        <div class="top-banner w-100  ">
            <div class="container content pb-5">
                <div class="row">
                    <div class="col-md-7 text-white col-12 fs-24 ff-mrsw ps-3 left-side mb-5 mb-md-0">
                        <h2 class="ff-avnr fw-normal fs-32">
                            Čo ti môžeme ponúknuť?
                        </h2>
                        <ul class=" mb-md-5">
                            <li><i class="fa fa-check text-orange me-2"></i> Mnohoročné skúsenosti</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Špičkových inštruktorov</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Viac vozidiel k výberu</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Široký výber kurzov</li>
                            <li><i class="fa fa-check text-orange me-2"></i> Vlastné autocvičisko</li>
                        </ul>
                        <p class="fs-32 d-inline d-lg-block">Prihlás sa ku nám a už ťa <span
                                class="text-orange">žiadna</span></p>
                        <p class="fs-32 d-inline d-lg-block "><span class="text-orange">križovatka</span>
                            nevyvedie z miery</p>

                    </div>
                    <div class="col-xl-4 col-md-5">
                        <div class="home-form ff-avnr fs-16">
                            <form autocomplete="off" id="showCourseRequestForm"
                                  action="javascript:"
                                  onsubmit="showCourseRequestModal(this)"
                                  class="p-3">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon1"><i
                                                class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Meno a priezvisko*"
                                           required
                                           aria-label="name_surname" aria-describedby="basic-addon1"
                                           name="name">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon2"><i
                                                class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email*" required
                                           aria-label="Email" aria-describedby="basic-addon2" name="email">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon3"><i
                                                class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" placeholder="Telefón"
                                           aria-label="Telefón" aria-describedby="basic-addon3" name="mobile">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-red text-white ff-mrsw fs-16">
                                        Prihlás sa k nám
                                    </button>
                                </div>
                            </form>

                            <div class="bottom p-3 ff-crd px-4">
                                <a href="" class="row align-items-center mb-3">
                                    <div class="col-md col-1 col-lg-1"><i class="fas fa-download"></i></div>
                                    <span class="fs-16 col-lg-11 col-10 ps-0 ps-lg-3">Žiadosť o udelenie vodičského oprávnenia</span>
                                </a>
                                <a href="" class="row align-items-center">
                                    <div class="col-md col-1 col-lg-1"><i class="fas fa-download"></i></div>
                                    <span class="fs-16 col-lg-11 col-10 ps-0 ps-lg-3">Žiadosť o zaevidovanie osoby sediacej na mieste spolujazdca vedľa vodiča</span>
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


    <div class="modal fade" id="courseRequestModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Žiadosť na kurz</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off"
                      action="javascript:"
                      onsubmit="sendLicenseRequest(this,'{{route('course_students.store')}}')"
                      class="p-3">
                    @csrf
                    <div class="modal-body">
                        <p>Ďakujeme Vám, <span id="modalUserName"></span>, že ste si nás vybrali. <br>Nižšie
                            si
                            zvoľte
                            svoj požadovaný kurz a jeho termín.</p>

                        <select name="licence_type_code" id="modalLicenceTypeSelect" required
                                data-placeholder="Typ kurzu"
                                data-course-fetch-url="{{route('courses.getAvailableByTypeCode',['type' => 'code'])}}"
                                class="select2">
                            @foreach($licenceTypes as $licenceType)
                                <option value="{{$licenceType->code}}">{{$licenceType->code}}</option>
                            @endforeach
                        </select>
                        <select name="course_id" id="modalCourseSelect" required hidden
                                data-placeholder="Termín kurzu"
                                class="select2">
                        </select>
                        <p class="text-danger" id="modalCourseSelectNotFoundMsg" hidden>Ľutujeme, ale
                            momentálne nemáme žiadne dostupné termíny. Môžete nám ale
                            <a class="fw-bold" href="{{route('contact')}}">zanechať správu</a>, a skúsime s
                            tým niečo urobiť. </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavrieť
                        </button>
                        <button type="submit" class="btn btn-primary">Uložiť</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--@push('scripts')--}}
{{--    --}}
{{--@endpush--}}
