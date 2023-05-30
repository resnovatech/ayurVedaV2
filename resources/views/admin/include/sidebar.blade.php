@php
$usr = Auth::guard('admin')->user();
@endphp
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('/')}}{{ $logo }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/')}}{{ $logo }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('/')}}{{ $logo }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/')}}{{ $logo }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Dashboard</span></li>

                @if ($usr->can('dashboard.view') || $usr->can('dashboard.edit'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboards</span>
                    </a>
                </li>
                @endif
                @if ($usr->can('walkByPatientAdd') || $usr->can('walkByPatientView') || $usr->can('walkByPatientDelete') || $usr->can('walkByPatientUpdate') || $usr->can('patientAdd') || $usr->can('patientView') || $usr->can('patientDelete') || $usr->can('patientUpdate') || $usr->can('patientAdmitAdd') || $usr->can('patientAdmitView') || $usr->can('patientAdmitDelete') || $usr->can('patientAdmitUpdate'))

                <li class="menu-title"><span data-key="t-menu">Reception</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index') || Route::is('patientAdmits.show') || Route::is('patients.edit') || Route::is('patients.create') || Route::is('patients.index') || Route::is('patients.show') || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index') || Route::is('walkByPatients.show') ? 'active' : '' }}" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-apps-2-line"></i> <span data-key="t-icons">Patient</span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index') || Route::is('patientAdmits.show') || Route::is('patients.edit') || Route::is('patients.create') || Route::is('patients.index') || Route::is('patients.show')  || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index') || Route::is('walkByPatients.show') ? 'show' : '' }}" id="sidebarIcons">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('walkByPatientAdd')  || $usr->can('walkByPatientView') ||  $usr->can('walkByPatientDelete') ||  $usr->can('walkByPatientUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('walkByPatients.index') }}" class="nav-link {{ Route::is('walkByPatients.show') || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index')  ? 'active' : '' }}" data-key="t-remix">Walking Patient</a>
                            </li>
                            @endif
                            @if ( $usr->can('patientAdd')  || $usr->can('patientView') ||  $usr->can('patientDelete') ||  $usr->can('patientUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patients.index') }}" class="nav-link {{ Route::is('patients.show') || Route::is('patients.edit') || Route::is('patients.create') || Route::is('patients.index')  ? 'active' : '' }}" data-key="t-boxicons">Patient</a>
                            </li>
                            @endif
                            @if ( $usr->can('patientAdmitAdd')  || $usr->can('patientAdmitView') ||  $usr->can('patientAdmitDelete') ||  $usr->can('patientAdmitUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patientAdmits.index') }}" class="nav-link {{ Route::is('patientAdmits.show') || Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index')  ? 'active' : '' }}" data-key="t-material-design">Patient Admit</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif


                @if ($usr->can('doctorAppointmentAdd') || $usr->can('doctorAppointmentView') ||  $usr->can('doctorAppointmentDelete') ||  $usr->can('doctorAppointmentUpdate'))


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('doctorAppointments.index') ||  Route::is('doctorAppointments.create') || Route::is('doctorAppointments.edit') || Route::is('doctorAppointments.show') ? 'active':'' }}" href="#doctorAppointment" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-baidu-fill"></i> <span data-key="t-landing">Doctor Appointment</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('doctorAppointments.index') ||  Route::is('doctorAppointments.create') || Route::is('doctorAppointments.edit') || Route::is('doctorAppointments.show') ? 'show':'' }}" id="doctorAppointment">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('doctorAppointmentAdd'))
                            <li class="nav-item">
                                <a href="{{ route('doctorAppointments.create') }}" class="nav-link {{ Route::is('doctorAppointments.create')  ? 'active' : '' }}" data-key="t-one-page">Add New Doctor Appointment</a>
                            </li>
                            @endif
                            @if ($usr->can('doctorAppointmentView') ||  $usr->can('doctorAppointmentDelete') ||  $usr->can('doctorAppointmentUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('doctorAppointments.index') }}" class="nav-link {{ Route::is('doctorAppointments.index') || Route::is('doctorAppointments.edit') || Route::is('doctorAppointments.show') ? 'active' : '' }}" data-key="t-nft-landing"> Appointment List </a>
                            </li>
                            @endif
                        </ul>

                    </div>
                </li>
                @endif


                @if ($usr->can('walkByPatientTherapyAdd') || $usr->can('walkByPatientTherapyView') ||  $usr->can('walkByPatientTherapyDelete') ||  $usr->can('walkByPatientTherapyUpdate'))

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('walkByPatientTherapy.index') ||  Route::is('walkByPatientTherapy.create') || Route::is('walkByPatientTherapy.edit') || Route::is('walkByPatientTherapy.show') ? 'active':'' }}" href="#therapyAppointment23" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="bx bx-receipt"></i> <span data-key="t-landing">Single Therapy Appointment</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('walkByPatientTherapy.index') ||  Route::is('walkByPatientTherapy.create') || Route::is('walkByPatientTherapy.edit') || Route::is('walkByPatientTherapy.show') ? 'show':'' }}" id="therapyAppointment23">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('walkByPatientTherapyAdd'))
                            <li class="nav-item">
                                <a href="{{ route('walkByPatientTherapy.create') }}" class="nav-link {{ Route::is('walkByPatientTherapy.create')  ? 'active' : '' }}" data-key="t-one-page">Add New Therapy Appointment</a>
                            </li>
                            @endif
                            @if ($usr->can('walkByPatientTherapyView') ||  $usr->can('walkByPatientTherapyDelete') ||  $usr->can('walkByPatientTherapyUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('walkByPatientTherapy.index') }}" class="nav-link {{ Route::is('walkByPatientTherapy.index') || Route::is('walkByPatientTherapy.edit') || Route::is('walkByPatientTherapy.show') ? 'active' : '' }}" data-key="t-nft-landing"> Therapy Appointment List </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if ($usr->can('therapyAppointmentAdd') || $usr->can('therapyAppointmentView') ||  $usr->can('therapyAppointmentDelete') ||  $usr->can('therapyAppointmentUpdate'))

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('therapyAppointments.index') ||  Route::is('therapyAppointments.create') || Route::is('therapyAppointments.edit') || Route::is('therapyAppointments.show') ? 'active':'' }}" href="#therapyAppointment" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="bx bx-receipt"></i> <span data-key="t-landing">Therapy Appointment</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('therapyAppointments.index') ||  Route::is('therapyAppointments.create') || Route::is('therapyAppointments.edit') || Route::is('therapyAppointments.show') ? 'show':'' }}" id="therapyAppointment">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('therapyAppointmentAdd'))
                            <li class="nav-item">
                                <a href="{{ route('therapyAppointments.create') }}" class="nav-link {{ Route::is('therapyAppointments.create')  ? 'active' : '' }}" data-key="t-one-page">Add New Therapy Appointment</a>
                            </li>
                            @endif
                            @if ($usr->can('therapyAppointmentView') ||  $usr->can('therapyAppointmentDelete') ||  $usr->can('therapyAppointmentUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyAppointments.index') }}" class="nav-link {{ Route::is('therapyAppointments.index') || Route::is('therapyAppointments.edit') || Route::is('therapyAppointments.show') ? 'active' : '' }}" data-key="t-nft-landing"> Therapy Appointment List </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if ($usr->can('BillingAdd') || $usr->can('BillingView') ||  $usr->can('BillingDelete') ||  $usr->can('BillingUpdate') || $usr->can('revisedBillingAdd') || $usr->can('revisedBillingView') ||  $usr->can('revisedBillingDelete') ||  $usr->can('revisedBillingUpdate'))

                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('billings.index') ||  Route::is('billings.create') || Route::is('billings.edit') || Route::is('billings.show') ||  Route::is('revisedBillings.index') ||  Route::is('revisedBillings.create') || Route::is('revisedBillings.edit') || Route::is('revisedBillings.show') ? 'active':'' }}" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Billing</span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('billings.index') ||  Route::is('billings.create') || Route::is('billings.edit') || Route::is('billings.show') ||  Route::is('revisedBillings.index') ||  Route::is('revisedBillings.create') || Route::is('revisedBillings.edit') || Route::is('revisedBillings.show') ? 'show':'' }}" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('BillingAdd') ||  $usr->can('BillingView') ||  $usr->can('BillingDelete') ||  $usr->can('BillingUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('billings.index') }}" class="nav-link {{ Route::is('billings.index') || Route::is('billings.create') || Route::is('billings.edit') || Route::is('billings.show') ? 'active' : '' }}" data-key="t-basic-tables">Billing List</a>
                            </li>
                            @endif
                            @if ($usr->can('revisedBillingAdd') ||  $usr->can('revisedBillingView') ||  $usr->can('revisedBillingDelete') ||  $usr->can('revisedBillingUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('revisedBillings.index') }}" class="nav-link {{ Route::is('revisedBillings.index') || Route::is('revisedBillings.index') || Route::is('revisedBillings.edit') || Route::is('revisedBillings.show') ? 'active' : '' }}" data-key="t-grid-js">Revised Bill Quotation</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if ($usr->can('patientPrescriptionListAdd') ||  $usr->can('patientPrescriptionListView') ||  $usr->can('patientPrescriptionListDelete') ||  $usr->can('patientPrescriptionListUpdate') || $usr->can('doctorWaitingListAdd') ||  $usr->can('doctorWaitingListView') ||  $usr->can('doctorWaitingListDelete') ||  $usr->can('doctorWaitingListUpdate') || $usr->can('doctorAdd') || $usr->can('doctorView') || $usr->can('doctorDelete') || $usr->can('doctorUpdate'))
                <li class="menu-title"><span data-key="t-menu">Doctor Section</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('patientPrecriptions.index') ||  Route::is('addPatientPrescriptionInfo') || Route::is('addPatientHistory') || Route::is('DoctorWaitingList') || Route::is('patientPrecriptions.show') ? 'active':'' }}" href="#doctorWaiting" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-hail-line"></i> <span data-key="t-tables">Doctor Attend</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('patientPrecriptions.index') ||  Route::is('addPatientPrescriptionInfo') || Route::is('addPatientHistory') || Route::is('DoctorWaitingList') || Route::is('patientPrecriptions.show') ? 'show':'' }}" id="doctorWaiting">
                        <ul class="nav nav-sm flex-column">

                            @if ($usr->can('doctorWaitingListAdd') ||  $usr->can('doctorWaitingListView') ||  $usr->can('doctorWaitingListDelete') ||  $usr->can('doctorWaitingListUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('DoctorWaitingList') }}" class="nav-link {{ Route::is('addPatientPrescriptionInfo') || Route::is('DoctorWaitingList') || Route::is('addPatientHistory') ? 'active' : '' }}" data-key="t-basic-tables">Doctor Waiting List</a>
                            </li>
@endif

@if ($usr->can('patientPrescriptionListAdd') ||  $usr->can('patientPrescriptionListView') ||  $usr->can('patientPrescriptionListDelete') ||  $usr->can('patientPrescriptionListUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patientPrecriptions.index') }}" class="nav-link {{ Route::is('patientPrecriptions.index') || Route::is('patientPrecriptions.show') ? 'active' : '' }}" data-key="t-grid-js">Patient Prescription List</a>
                            </li>
@endif


                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('doctors.show') || Route::is('doctors.create') ||Route::is('doctors.edit') || Route::is('doctors.index') ? 'active' : '' }}" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Doctor</span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('doctors.show') || Route::is('doctors.create') ||Route::is('doctors.edit') || Route::is('doctors.index') ? 'show' : '' }}" id="sidebarTables">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('doctorAdd'))
                            <li class="nav-item">
                                <a href="{{ route('doctors.create') }}" class="nav-link {{ Route::is('doctors.create')  ? 'active' : '' }}" data-key="t-basic-tables">Add New Doctor</a>
                            </li>
                            @endif
                            @if ( $usr->can('doctorView') ||  $usr->can('doctorDelete') ||  $usr->can('doctorUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('doctors.index') }}" class="nav-link {{Route::is('doctors.edit') || Route::is('doctors.index') ? 'active' : '' }}" data-key="t-grid-js">Doctor List</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('dietCharts.edit') || Route::is('dietCharts.create') || Route::is('dietCharts.index') || Route::is('healthSupplements.index') || Route::is('therapyIngredients.index') || Route::is('therapyLists.index') || Route::is('therapyPackages.index') ? 'active' : '' }}" href="#prescriptionList" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-landscape-line"></i> <span data-key="t-tables">Prescription Equipment </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('dietCharts.edit') || Route::is('dietCharts.create') || Route::is('dietCharts.index') ||  Route::is('medicineLists.index') || Route::is('healthSupplements.index') || Route::is('therapyIngredients.index') || Route::is('therapyLists.index') || Route::is('therapyPackages.index') ? 'show' : '' }}" id="prescriptionList">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('dietChartsAdd')  || $usr->can('dietChartsView') ||  $usr->can('dietChartsDelete') ||  $usr->can('dietChartsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('dietCharts.index') }}" class="nav-link {{ Route::is('dietCharts.edit') || Route::is('dietCharts.create') || Route::is('dietCharts.index') ? 'active' : '' }}" data-key="t-basic-tables">Diet Chart</a>
                            </li>
                            @endif

                            @if ( $usr->can('healthSupplementsAdd')  || $usr->can('healthSupplementsView') ||  $usr->can('healthSupplementsDelete') ||  $usr->can('healthSupplementsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('healthSupplements.index') }}" class="nav-link {{ Route::is('healthSupplements.index') ? 'active' : '' }}" data-key="t-grid-js">Health Supplement</a>
                            </li>
                            @endif

                            @if ( $usr->can('therapyIngredientsAdd')  || $usr->can('therapyIngredientsView') ||  $usr->can('therapyIngredientsDelete') ||  $usr->can('therapyIngredientsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyIngredients.index') }}" class="nav-link {{ Route::is('therapyIngredients.index') ? 'active' : '' }}" data-key="t-grid-js">Therapy Ingredient</a>
                            </li>
                            @endif

                            @if ( $usr->can('therapyListsAdd')  || $usr->can('therapyListsView') ||  $usr->can('therapyListsDelete') ||  $usr->can('therapyListsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyLists.index') }}" class="nav-link {{ Route::is('therapyLists.index') ? 'active' : '' }}" data-key="t-grid-js">Therapy List</a>
                            </li>
                            @endif

                            @if ( $usr->can('therapyPackagesAdd')  || $usr->can('therapyPackagesView') ||  $usr->can('therapyPackagesDelete') ||  $usr->can('therapyPackagesUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyPackages.index') }}" class="nav-link {{ Route::is('therapyPackages.index') ? 'active' : '' }}" data-key="t-grid-js">Therapy Package</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><span data-key="t-menu">Medicine Section</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('medicineEquipment.index') ||  Route::is('medicineLists.index') || Route::is('powderList.index') || Route::is('packageList.index') ? 'active' : '' }}" href="#prescriptionListTwo" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-landscape-line"></i> <span data-key="t-tables">Medicine Equipment </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('medicineEquipment.index') ||  Route::is('medicineLists.index') || Route::is('powderList.index') || Route::is('packageList.index') ? 'show' : '' }}" id="prescriptionListTwo">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('medicineEquipmentAdd')  || $usr->can('medicineEquipmentView') ||  $usr->can('medicineEquipmentDelete') ||  $usr->can('medicineEquipmentUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('medicineEquipment.index') }}" class="nav-link {{ Route::is('medicineEquipment.index') ? 'active' : '' }}" data-key="t-basic-tables">Medicine Equipment</a>
                            </li>
                            @endif
                            @if ( $usr->can('powderAdd')  || $usr->can('powderView') ||  $usr->can('powderDelete') ||  $usr->can('powderUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('powderList.index') }}" class="nav-link {{ Route::is('powderList.index') ? 'active' : '' }}" data-key="t-grid-js">Powder List</a>
                            </li>
                            @endif
                            @if ( $usr->can('packageAdd')  || $usr->can('packageView') ||  $usr->can('packageDelete') ||  $usr->can('packageUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('packageList.index') }}" class="nav-link {{ Route::is('packageList.index') ? 'active' : '' }}" data-key="t-grid-js">Package List</a>
                            </li>
                            @endif
                            @if ( $usr->can('medicineListsAdd')  || $usr->can('medicineListsView') ||  $usr->can('medicineListsDelete') ||  $usr->can('medicineListsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('medicineLists.index') }}" class="nav-link {{ Route::is('medicineLists.index') ? 'active' : '' }}" data-key="t-grid-js">Medicine List</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>


                <li class="menu-title"><span data-key="t-menu">Form Section</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('agrementFormTwo.index') ||  Route::is('agrementFormTwo.create') || Route::is('agrementFormTwo.edit') || Route::is('agrementFormTwo.show') || Route::is('agrementFormOne.index') ||  Route::is('agrementFormOne.create') || Route::is('agrementFormOne.edit') || Route::is('agrementFormOne.show') ? 'active' : '' }}" href="#prescriptionListTwoo" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-landscape-line"></i> <span data-key="t-tables">Agreement Form </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('agrementFormTwo.index') ||  Route::is('agrementFormTwo.create') || Route::is('agrementFormTwo.edit') || Route::is('agrementFormTwo.show') || Route::is('agrementFormOne.index') ||  Route::is('agrementFormOne.create') || Route::is('agrementFormOne.edit') || Route::is('agrementFormOne.show') ? 'show' : '' }}" id="prescriptionListTwoo">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('agreementFormOneAdd')  || $usr->can('agreementFormOneView') ||  $usr->can('agreementFormOneDelete') ||  $usr->can('agreementFormOneUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormOne.index') }}" class="nav-link {{ Route::is('agrementFormOne.index') ? 'active' : '' }}" data-key="t-basic-tables">Vaman Karma</a>
                            </li>
                            @endif
                            @if ( $usr->can('agreementFormTwoAdd')  || $usr->can('agreementFormTwoView') ||  $usr->can('agreementFormTwoDelete') ||  $usr->can('agreementFormTwoUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormTwo.index') }}" class="nav-link {{ Route::is('agrementFormTwo.index') ? 'active' : '' }}" data-key="t-grid-js">Panchkarma</a>
                            </li>
                            @endif

                            @if ( $usr->can('agreementFormThreeAdd')  || $usr->can('agreementFormThreeView') ||  $usr->can('agreementFormThreeDelete') ||  $usr->can('agreementFormThreeUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormThree.index') }}" class="nav-link {{ Route::is('agrementFormThree.index') ? 'active' : '' }}" data-key="t-grid-js">Virechan Karma</a>
                            </li>
                            @endif



                        </ul>
                    </div>
                </li>





                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('treatMentChart.index') ? 'active' : '' }}" href="{{ route('treatMentChart.index') }}">
                        <i class="ri-align-justify"></i> <span data-key="t-widgets">TreatMent Chart</span>
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">HR Section</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('staff.index') ? 'active' : '' }}" href="{{ route('staff.index') }}">
                        <i class="ri-align-justify"></i> <span data-key="t-widgets">Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('reward.index') ? 'active' : '' }}" href="{{ route('reward.index') }}">
                        <i class="ri-paypal-fill"></i> <span data-key="t-widgets">Reward</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('therapist.show') || Route::is('therapist.index') ? 'active' : '' }}" href="{{ route('therapist.index') }}">
                        <i class="ri-barricade-fill"></i> <span data-key="t-widgets">Therapist</span>
                    </a>
                </li>

                @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate') || $usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate') || $usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate') || $usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Setting</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('systemInformation.index') || Route::is('permission.index') || Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') || Route::is('user.index') ? 'active' : '' }}" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-settings-5-line"></i> <span data-key="t-landing">Setting</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('systemInformation.index') || Route::is('permission.index') || Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') || Route::is('user.index') ? 'show' : '' }}" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('systemInformationAdd') || $usr->can('systemInformationView') || $usr->can('systemInformationDelete') || $usr->can('systemInformationUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('systemInformation.index') }}" class="nav-link {{ Route::is('systemInformation.index') ? 'active' : '' }}" data-key="t-calendar">System Information</a>
                            </li>
                            @endif
                            @if ($usr->can('userAdd') || $usr->can('userView') || $usr->can('userDelete') || $usr->can('userUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link {{ Route::is('user.index') ? 'active' : '' }}" data-key="t-one-page">User</a>
                            </li>
                            @endif
                            @if ($usr->can('roleAdd') || $usr->can('roleView') || $usr->can('roleDelete') || $usr->can('roleUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link {{ Route::is('role.index') || Route::is('role.edit') || Route::is('role.create') ? 'active' : '' }}" data-key="t-nft-landing">Role </a>
                            </li>
                            @endif
                            @if ($usr->can('permissionAdd') || $usr->can('permissionView') || $usr->can('permissionDelete') || $usr->can('permissionUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('permission.index') }}" class="nav-link {{ Route::is('permission.index') ? 'active' : '' }}"><span data-key="t-job">Permission</span>
                            </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
