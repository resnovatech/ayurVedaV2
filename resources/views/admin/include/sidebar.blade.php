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

                <li class="menu-title"><span data-key="t-menu">Front Desk</span></li>


                @if ($usr->can('receptioninsTherapyView'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('therapyListForReceptionist') ? 'active' : '' }}" href="{{ route('therapyListForReceptionist') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Appointment list for front desk</span>
                    </a>
                </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index') || Route::is('patientAdmits.show') || Route::is('patients.edit') || Route::is('patients.create') || Route::is('patients.index') || Route::is('patients.show') || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index') || Route::is('walkByPatients.show') ? 'active' : '' }}" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-user-shared-line"></i> <span data-key="t-icons">Client</span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index') || Route::is('patientAdmits.show') || Route::is('patients.edit') || Route::is('patients.create') || Route::is('patients.index') || Route::is('patients.show')  || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index') || Route::is('walkByPatients.show') ? 'show' : '' }}" id="sidebarIcons">
                        <ul class="nav nav-sm flex-column">
                             @if ( $usr->can('patientAdd')  || $usr->can('patientView') ||  $usr->can('patientDelete') ||  $usr->can('patientUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patients.create') }}" class="nav-link {{ Route::is('patients.show') || Route::is('patients.edit') || Route::is('patients.create')   ? 'active' : '' }}" data-key="t-boxicons">Client</a>
                            </li>
                            @endif
                            @if ( $usr->can('walkByPatientAdd')  || $usr->can('walkByPatientView') ||  $usr->can('walkByPatientDelete') ||  $usr->can('walkByPatientUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('walkByPatients.create') }}" class="nav-link {{ Route::is('walkByPatients.show') || Route::is('walkByPatients.edit') || Route::is('walkByPatients.create') || Route::is('walkByPatients.index')  ? 'active' : '' }}" data-key="t-remix">Patient</a>
                            </li>
                            @endif

                            @if ( $usr->can('patientAdmitAdd')  || $usr->can('patientAdmitView') ||  $usr->can('patientAdmitDelete') ||  $usr->can('patientAdmitUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patientAdmits.create') }}" class="nav-link {{ Route::is('patientAdmits.show') || Route::is('patientAdmits.edit') || Route::is('patientAdmits.create') || Route::is('patientAdmits.index')  ? 'active' : '' }}" data-key="t-material-design">Admission</a>
                            </li>
                            @endif

                               @if ( $usr->can('patientAdmitView')  || $usr->can('patientView') ||  $usr->can('walkByPatientView'))
                            <li class="nav-item">
                                <a href="{{ route('patients.index') }}" class="nav-link {{  Route::is('patients.index')  ? 'active' : '' }}" data-key="t-boxicons">Patient List</a>
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
                        <i class="ri-task-fill"></i> <span data-key="t-landing">Doctor Appointment</span>
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
                        <i class="ri-file-list-2-fill"></i> <span data-key="t-landing">Single Therapy Appointment</span>
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
                        <i class="ri-bill-line"></i> <span data-key="t-landing">Therapy Appointment</span>
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


                  @if ($usr->can('signatureTherapyAdd') || $usr->can('signatureTherapyView') ||  $usr->can('signatureTherapyDelete') ||  $usr->can('signatureTherapyyUpdate'))

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('signatureTherapyAdd') ||  Route::is('signatureTherapyList') || Route::is('signatureTherapyEdit')  ? 'active':'' }}" href="#therapyAppointment234" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-file-list-2-fill"></i> <span data-key="t-landing">Signature Package Appointment</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('signatureTherapyAdd') ||  Route::is('signatureTherapyList') || Route::is('signatureTherapyEdit')  ? 'show':'' }}" id="therapyAppointment234">
                        <ul class="nav nav-sm flex-column">
                            @if ($usr->can('walkByPatientTherapyAdd'))
                            <li class="nav-item">
                                <a href="{{ route('signatureTherapyAdd') }}" class="nav-link {{ Route::is('signatureTherapyAdd')  ? 'active' : '' }}" data-key="t-one-page">Add New Signature Package Appointment</a>
                            </li>
                            @endif
                            @if ($usr->can('walkByPatientTherapyView') ||  $usr->can('walkByPatientTherapyDelete') ||  $usr->can('walkByPatientTherapyUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('signatureTherapyList') }}" class="nav-link {{ Route::is('signatureTherapyList') || Route::is('signatureTherapyAdd') || Route::is('signatureTherapyEdit') ? 'active' : '' }}" data-key="t-nft-landing"> Signature Package Appointment List </a>
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
                        <i class="las la-file-invoice"></i> <span data-key="t-tables">Billing</span>
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
                                <a href="{{ route('revisedBillings.index') }}" class="nav-link {{ Route::is('revisedBillings.index') || Route::is('revisedBillings.index') || Route::is('revisedBillings.edit') || Route::is('revisedBillings.show') ? 'active' : '' }}" data-key="t-grid-js">Revised Billing List</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if ($usr->can('patientPrescriptionListAdd') ||  $usr->can('patientPrescriptionListView') ||  $usr->can('patientPrescriptionListDelete') ||  $usr->can('patientPrescriptionListUpdate') || $usr->can('doctorWaitingListAdd') ||  $usr->can('doctorWaitingListView') ||  $usr->can('doctorWaitingListDelete') ||  $usr->can('doctorWaitingListUpdate') || $usr->can('doctorAdd') || $usr->can('doctorView') || $usr->can('doctorDelete') || $usr->can('doctorUpdate'))
                <li class="menu-title"><span data-key="t-menu">Doctor Section</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('patientPrecriptions.index') ||  Route::is('addPatientPrescriptionInfo') || Route::is('addPatientHistory') || Route::is('doctorWaitingList') || Route::is('patientPrecriptions.show') || Route::is('addTherapyInPrescription') ? 'active':'' }}" href="#doctorWaiting" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-file-edit-line"></i> <span data-key="t-tables">Doctor Attend</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Route::is('patientPrecriptions.index') ||  Route::is('addPatientPrescriptionInfo') || Route::is('addPatientHistory') || Route::is('doctorWaitingList') || Route::is('patientPrecriptions.show') || Route::is('addTherapyInPrescription')  ? 'show':'' }}" id="doctorWaiting">
                        <ul class="nav nav-sm flex-column">

                            @if ($usr->can('doctorWaitingListAdd') ||  $usr->can('doctorWaitingListView') ||  $usr->can('doctorWaitingListDelete') ||  $usr->can('doctorWaitingListUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('doctorWaitingList') }}" class="nav-link {{ Route::is('addPatientPrescriptionInfo') || Route::is('doctorWaitingList') || Route::is('addPatientHistory') || Route::is('addTherapyInPrescription')  ? 'active' : '' }}" data-key="t-basic-tables">Doctor Waiting List</a>
                            </li>
@endif

@if ($usr->can('patientPrescriptionListAdd') ||  $usr->can('patientPrescriptionListView') ||  $usr->can('patientPrescriptionListDelete') ||  $usr->can('patientPrescriptionListUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('patientPrecriptions.index') }}" class="nav-link {{ Route::is('patientPrecriptions.index') || Route::is('patientPrecriptions.show') ? 'active' : '' }}" data-key="t-grid-js">Patient Attend</a>
                            </li>
@endif


                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('doctors.show') || Route::is('doctors.create') ||Route::is('doctors.edit') || Route::is('doctors.index') ? 'active' : '' }}" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="las la-stethoscope"></i> <span data-key="t-tables">Doctor</span>
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

                @if ( $usr->can('therapyListsAdd')  || $usr->can('therapyListsView') ||  $usr->can('therapyListsDelete') ||  $usr->can('therapyListsUpdate') || $usr->can('therapyIngredientsAdd')  || $usr->can('therapyIngredientsView') ||  $usr->can('therapyIngredientsDelete') ||  $usr->can('therapyIngredientsUpdate')|| $usr->can('healthSupplementsAdd')  || $usr->can('healthSupplementsView') ||  $usr->can('healthSupplementsDelete') ||  $usr->can('healthSupplementsUpdate') || $usr->can('therapyPackagesAdd')  || $usr->can('therapyPackagesView') ||  $usr->can('therapyPackagesDelete') ||  $usr->can('therapyPackagesUpdate') || $usr->can('dietChartsAdd')  || $usr->can('dietChartsView') ||  $usr->can('dietChartsDelete') ||  $usr->can('dietChartsUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('dietCharts.edit') || Route::is('dietCharts.create') || Route::is('dietCharts.index') || Route::is('healthSupplements.index') || Route::is('therapyIngredients.index') || Route::is('therapyLists.index') || Route::is('therapyPackages.index') ? 'active' : '' }}" href="#prescriptionList" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-survey-fill"></i> <span data-key="t-tables">Prescription Equipment </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('dietCharts.edit') || Route::is('dietCharts.create') || Route::is('dietCharts.index')  || Route::is('healthSupplements.index') || Route::is('therapyIngredients.index') || Route::is('therapyLists.index') || Route::is('therapyPackages.index') ? 'show' : '' }}" id="prescriptionList">
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
                            {{-- <li class="nav-item">
                                <a href="{{ route('therapyIngredients.index') }}" class="nav-link {{ Route::is('therapyIngredients.index') ? 'active' : '' }}" data-key="t-grid-js">Therapy Ingredient</a>
                            </li> --}}
                            @endif

                            @if ( $usr->can('therapyListsAdd')  || $usr->can('therapyListsView') ||  $usr->can('therapyListsDelete') ||  $usr->can('therapyListsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyLists.index') }}" class="nav-link {{ Route::is('therapyLists.index') ? 'active' : '' }}" data-key="t-grid-js">All Therapy List</a>
                            </li>
                            @endif

                            @if ( $usr->can('therapyPackagesAdd')  || $usr->can('therapyPackagesView') ||  $usr->can('therapyPackagesDelete') ||  $usr->can('therapyPackagesUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('therapyPackages.index') }}" class="nav-link {{ Route::is('therapyPackages.index') ? 'active' : '' }}" data-key="t-grid-js">Therapy Package</a>
                            </li>
                            @endif

                             @if ($usr->can('facePackAdd')  || $usr->can('facePackView') ||  $usr->can('facePackDelete') ||  $usr->can('facePackUpdate'))
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('facePackInfoList.index') ? 'active' : '' }}" href="{{ route('facePackInfoList.index') }}">
                        <span data-key="t-widgets">Facial Pack  List</span>
                    </a>
                </li>
                @endif

                 @if ($usr->can('facialInfoListAdd') || $usr->can('facialInfoListView') || $usr->can('facialInfoListDelete') || $usr->can('facialInfoListUpdate'))
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Route::is('facialInfoList.index') ? 'active' : '' }}" href="{{ route('facialInfoList.index') }}">
                        <span data-key="t-widgets">Facial Pack Info List</span>
                    </a>
                </li> --}}
                @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if ( $usr->can('medicineListsAdd')  || $usr->can('medicineListsView') ||  $usr->can('medicineListsDelete') ||  $usr->can('medicineListsUpdate') || $usr->can('packageAdd')  || $usr->can('packageView') ||  $usr->can('packageDelete') ||  $usr->can('packageUpdate') || $usr->can('powderAdd')  || $usr->can('powderView') ||  $usr->can('powderDelete') ||  $usr->can('powderUpdate')|| $usr->can('medicineEquipmentAdd')  || $usr->can('medicineEquipmentView') ||  $usr->can('medicineEquipmentDelete') ||  $usr->can('medicineEquipmentUpdate'))
                <li class="menu-title"><span data-key="t-menu">Medicine Section</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('medicineEquipment.index') ||  Route::is('medicineLists.index') || Route::is('powderList.index') || Route::is('packageList.index') ? 'active' : '' }}" href="#prescriptionListTwo" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="las la-medkit"></i> <span data-key="t-tables">Medicine Equipment </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('medicineEquipment.index') ||  Route::is('medicineLists.index') || Route::is('powderList.index') || Route::is('packageList.index') ? 'show' : '' }}" id="prescriptionListTwo">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('medicineEquipmentAdd')  || $usr->can('medicineEquipmentView') ||  $usr->can('medicineEquipmentDelete') ||  $usr->can('medicineEquipmentUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('medicineEquipment.index') }}" class="nav-link {{ Route::is('medicineEquipment.index') ? 'active' : '' }}" data-key="t-basic-tables">Medicine Name</a>
                            </li>
                            @endif
                            @if ( $usr->can('powderAdd')  || $usr->can('powderView') ||  $usr->can('powderDelete') ||  $usr->can('powderUpdate'))
                            {{-- <li class="nav-item">
                                <a href="{{ route('powderList.index') }}" class="nav-link {{ Route::is('powderList.index') ? 'active' : '' }}" data-key="t-grid-js">Powder List</a>
                            </li> --}}
                            @endif
                            @if ( $usr->can('packageAdd')  || $usr->can('packageView') ||  $usr->can('packageDelete') ||  $usr->can('packageUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('packageList.index') }}" class="nav-link {{ Route::is('packageList.index') ? 'active' : '' }}" data-key="t-grid-js">Medicine Package </a>
                            </li>
                            @endif
                            @if ( $usr->can('medicineListsAdd')  || $usr->can('medicineListsView') ||  $usr->can('medicineListsDelete') ||  $usr->can('medicineListsUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('medicineLists.index') }}" class="nav-link {{ Route::is('medicineLists.index') ? 'active' : '' }}" data-key="t-grid-js">Tablet Name</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>
@endif
@if (  $usr->can('agreementFormThreeAdd')  || $usr->can('agreementFormThreeView') ||  $usr->can('agreementFormThreeDelete') ||  $usr->can('agreementFormThreeUpdate') || $usr->can('agreementFormTwoAdd')  || $usr->can('agreementFormTwoView') ||  $usr->can('agreementFormTwoDelete') ||  $usr->can('agreementFormTwoUpdate')|| $usr->can('agreementFormOneAdd')  || $usr->can('agreementFormOneView') ||  $usr->can('agreementFormOneDelete') ||  $usr->can('agreementFormOneUpdate'))
                <li class="menu-title"><span data-key="t-menu">Form Section</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{Route::is('agreementFormThree.edit') || Route::is('agreementFormThree.index') || Route::is('agreementFormThree.create') || Route::is('agreementFormTwo.index') ||  Route::is('agreementFormTwo.create') || Route::is('agreementFormTwo.edit') || Route::is('agreementFormTwo.show') || Route::is('agreementFormOne.index') ||  Route::is('agreementFormOne.create') || Route::is('agreementFormOne.edit') || Route::is('agreementFormOne.show') ? 'active' : '' }}" href="#prescriptionListTwoo" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-clipboard-fill"></i> <span data-key="t-tables">Agreement Form </span>
                    </a>
                    <div class="collapse menu-dropdown {{Route::is('agreementFormThree.edit') || Route::is('agreementFormThree.index') || Route::is('agreementFormThree.create') || Route::is('agreementFormTwo.index') ||  Route::is('agreementFormTwo.create') || Route::is('agreementFormTwo.edit') || Route::is('agreementFormTwo.show') || Route::is('agreementFormOne.index') ||  Route::is('agreementFormOne.create') || Route::is('agreementFormOne.edit') || Route::is('agreementFormOne.show') ? 'show' : '' }}" id="prescriptionListTwoo">
                        <ul class="nav nav-sm flex-column">
                            @if ( $usr->can('agreementFormOneAdd')  || $usr->can('agreementFormOneView') ||  $usr->can('agreementFormOneDelete') ||  $usr->can('agreementFormOneUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormOne.index') }}" class="nav-link {{ Route::is('agreementFormOne.index') ? 'active' : '' }}" data-key="t-basic-tables">Vaman Karma</a>
                            </li>
                            @endif
                            @if ( $usr->can('agreementFormTwoAdd')  || $usr->can('agreementFormTwoView') ||  $usr->can('agreementFormTwoDelete') ||  $usr->can('agreementFormTwoUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormTwo.index') }}" class="nav-link {{ Route::is('agreementFormTwo.index') ? 'active' : '' }}" data-key="t-grid-js">Panchkarma</a>
                            </li>
                            @endif

                            @if ( $usr->can('agreementFormThreeAdd')  || $usr->can('agreementFormThreeView') ||  $usr->can('agreementFormThreeDelete') ||  $usr->can('agreementFormThreeUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('agreementFormThree.index') }}" class="nav-link {{ Route::is('agreementFormThree.index') ? 'active' : '' }}" data-key="t-grid-js">Virechan Karma</a>
                            </li>
                            @endif



                        </ul>
                    </div>
                </li>





                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('treatMentChart.index') ? 'active' : '' }}" href="{{ route('treatMentChart.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">TreatMent Chart</span>
                    </a>
                </li>
                @endif

                 @if ($usr->can('all_therapryAdd') || $usr->can('all_therapryView') || $usr->can('all_therapryDelete') || $usr->can('all_therapryUpdate'))
                <li class="menu-title"><span data-key="t-menu">Therapy Appoinment Detail</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('all_appoinment_detail') ? 'active' : '' }}" href="{{ route('all_appoinment_detail') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Appoinment List</span>
                    </a>
                </li>
                @endif


                @if ($usr->can('therapyMakerAdd') || $usr->can('therapyMakerView') || $usr->can('therapyMakerDelete') || $usr->can('therapyMakerUpdate'))
                <li class="menu-title"><span data-key="t-menu">Therapy Maker</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('therapyMakerList.index') ? 'active' : '' }}" href="{{ route('therapyMakerList.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Therapy Maker List</span>
                    </a>
                </li>
                @endif


                @if ( $usr->can('inventoryAdd') || $usr->can('inventoryView') || $usr->can('inventoryDelete') || $usr->can('inventoryUpdate')|| $usr->can('inventoryCategoryAdd') || $usr->can('inventoryCategoryView') || $usr->can('inventoryCategoryDelete') || $usr->can('inventoryCategoryUpdate'))
                <li class="menu-title"><span data-key="t-menu">Inventory  </span></li>
                @if ($usr->can('inventoryCategoryAdd') || $usr->can('inventoryCategoryView') || $usr->can('inventoryCategoryDelete') || $usr->can('inventoryCategoryUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('inventoryCategoryList.index') ? 'active' : '' }}" href="{{ route('inventoryCategoryList.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Inventory Category List</span>
                    </a>
                </li>
                @endif
                @if ($usr->can('inventoryNameAdd') || $usr->can('inventoryNameView') || $usr->can('inventoryNameDelete') || $usr->can('inventoryNameUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('inventoryNameInfo.index') ? 'active' : '' }}" href="{{ route('inventoryNameInfo.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Inventory Name List</span>
                    </a>
                </li>
                @endif

                 @if ($usr->can('inventoryMixerAdd') || $usr->can('inventoryMixerView') || $usr->can('inventoryMixerDelete') || $usr->can('inventoryMixerUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('inventoryMixerList') || Route::is('inventoryMixerAdd') || Route::is('inventoryMixerEdit') ? 'active' : '' }}" href="{{ route('inventoryMixerList') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Inventory Mixer List</span>
                    </a>
                </li>
                @endif

                @if ($usr->can('inventoryAdd') || $usr->can('inventoryView') || $usr->can('inventoryDelete') || $usr->can('inventoryUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('inventoryList.index') ? 'active' : '' }}" href="{{ route('inventoryList.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Inventory List</span>
                    </a>
                </li>
                @endif



                @if ($usr->can('inventoryDamageAdd') || $usr->can('inventoryDamageView') || $usr->can('inventoryDamageDelete') || $usr->can('inventoryDamageUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('inventoryDamage.index') ? 'active' : '' }}" href="{{ route('inventoryDamage.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Inventory Damage</span>
                    </a>
                </li>
                @endif


                 @if ($usr->can('otherEquipmentAdd') || $usr->can('otherEquipmentView') || $usr->can('otherEquipmentDelete') || $usr->can('otherEquipmentUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('otherEquipment.index') ? 'active' : '' }}" href="{{ route('otherEquipment.index') }}">
                        <i class="bx bxs-file-plus"></i> <span data-key="t-widgets">Other Equipment</span>
                    </a>
                </li>
                @endif



                @endif
                @if ($usr->can('rewardAdd') || $usr->can('rewardView') || $usr->can('rewardDelete') || $usr->can('rewardUpdate') || $usr->can('therapistAdd') || $usr->can('therapistView') || $usr->can('therapistDelete') || $usr->can('therapistUpdate') || $usr->can('staffAdd') || $usr->can('staffView') || $usr->can('staffDelete') || $usr->can('staffUpdate'))
                <li class="menu-title"><span data-key="t-menu">HR Section</span></li>
                @if ($usr->can('staffAdd') || $usr->can('staffView') || $usr->can('staffDelete') || $usr->can('staffUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('staff.index') ? 'active' : '' }}" href="{{ route('staff.index') }}">
                        <i class="mdi mdi-account-multiple-check-outline"></i> <span data-key="t-widgets">Staff</span>
                    </a>
                </li>
                @endif
                @if ($usr->can('rewardAdd') || $usr->can('rewardView') || $usr->can('rewardDelete') || $usr->can('rewardUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('reward.index') ? 'active' : '' }}" href="{{ route('reward.index') }}">
                        <i class="bx bx-money"></i> <span data-key="t-widgets">Reward</span>
                    </a>
                </li>
                @endif
                @if ($usr->can('therapistAdd') || $usr->can('therapistView') || $usr->can('therapistDelete') || $usr->can('therapistUpdate'))
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('therapist.show') || Route::is('therapist.index') ? 'active' : '' }}" href="{{ route('therapist.index') }}">
                        <i class="mdi mdi-doctor"></i> <span data-key="t-widgets">Therapist</span>
                    </a>
                </li>
                @endif
@endif
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

                            @if ($usr->can('discount.Add') || $usr->can('discount.View') || $usr->can('discount.Delete') || $usr->can('discount.Update'))
                            <li class="nav-item">
                                <a href="{{ route('discount.index') }}" class="nav-link {{ Route::is('discount.index') ? 'active' : '' }}"><span data-key="t-job">Discount</span>
                            </a>
                            </li>
                            @endif

                            @if ($usr->can('vatAdd') || $usr->can('vatView') || $usr->can('vatDelete') || $usr->can('vatUpdate'))
                            <li class="nav-item">
                                <a href="{{ route('vat.index') }}" class="nav-link {{ Route::is('vat.index') ? 'active' : '' }}"><span data-key="t-job">Vat</span>
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
