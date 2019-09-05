@extends('system.partials.skinny-template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
        </div>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="blue" id="wizard">
                <form action="" method="">
                <!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                                <div class="p-3">
                                    <h1 class="text-center">Ixion Initial Setup</h1>
                                    <p class="lead text-center">Welcome to your new engagement platform!  We're still unpacking - in just a few moments we'll have everything ready to rock n' roll.</p>
                                </div>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#system-checks" data-toggle="tab">System Checks</a></li>
	                            <li><a href="#configuration" data-toggle="tab">Configuration</a></li>
	                            <li><a href="#review-configuration" data-toggle="tab">Review</a></li>
	                            <li><a href="#finish" data-toggle="tab">Finish</a></li>
	                        </ul>
						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="system-checks">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="">
                                                <div class="card-header"><h5>Global System Service Configuration</h5></div>

                                                <div class="card-body pb-3">
                                                    Service Hostnames & Creds...pull from .env
                                                    $service_configuration['default_database']
                                                    $service_configuration['default_database_driver']
                                                    $service_configuration['default_database_name']
                                                    Check for MySQL/MariaDB...
                                                    Check for Redis...
                                                    Check for Twilio...
                                                    Check for Mailgun...
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <hr class="mb-4 pb-3" />
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="">
                                                <div class="card-header"><h5>Status Check</h5></div>

                                                <div class="card-body pb-3">

                                                    <div class="accordion" id="statusChecks">
                                                        
                                                        <!-- START Migration Checks -->
                                                        <div class="">
                                                            <div class="text-left" id="checkDefaultMigrations">
                                                            <h5 class="mb-0">
                                                                <button class="btn d-inline-block w-100 btn-link text-left btn-sm pt-3 pb-3 mb-0 mt-0" type="button" data-toggle="collapse" data-target="#collapseCheckDefaultMigrations" aria-expanded="true" aria-controls="collapseCheckDefaultMigrations">
                                                                    <span class="pull-right">
                                                                        @if ($status_checks['migration_checks_total'])
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-times text-danger"></i>
                                                                        @endif
                                                                    </span>
                                                                    Base database migrations & tables...
                                                                </button>
                                                            </h5>
                                                            </div>

                                                            <div id="collapseCheckDefaultMigrations" class="collapse" aria-labelledby="checkDefaultMigrations" data-parent="#statusChecks">
                                                                <div class="card-body">

                                                                    @foreach($status_checks['migration_checks'] as $check)
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <span class="pull-right">
                                                                                    @if ($check['result'])
                                                                                        <i class="fas fa-check text-success"></i>
                                                                                    @else
                                                                                        <i class="fas fa-times text-danger"></i>
                                                                                    @endif
                                                                                </span>
                                                                                {!! $check['display_name'] !!}...
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- END Migration Checks -->
                                                        
                                                        <!-- START Permission Default Seeder Checks -->
                                                        <div class="">
                                                            <div class="text-left" id="checkPermissionsDefaultSeederMigrations">
                                                            <h5 class="mb-0">
                                                                <button class="btn d-inline-block w-100 btn-link text-left btn-sm pt-3 pb-3 mb-0 mt-0" type="button" data-toggle="collapse" data-target="#collapseCheckPermissionsDefaultSeederMigrations" aria-expanded="true" aria-controls="collapseCheckPermissionsDefaultSeederMigrations">
                                                                    <span class="pull-right">
                                                                        @if ($status_checks['permissions_default_seeder_checks_total'])
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-times text-danger"></i>
                                                                        @endif
                                                                    </span>
                                                                    Permission Default DB Seeder...
                                                                </button>
                                                            </h5>
                                                            </div>

                                                            <div id="collapseCheckPermissionsDefaultSeederMigrations" class="collapse" aria-labelledby="checkPermissionsDefaultSeederMigrations" data-parent="#statusChecks">
                                                                <div class="card-body">

                                                                    @foreach($status_checks['permissions_default_seeder_checks'] as $key => $check)
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <span class="pull-right">
                                                                                    @if ($check)
                                                                                        <i class="fas fa-check text-success"></i>
                                                                                    @else
                                                                                        <i class="fas fa-times text-danger"></i>
                                                                                    @endif
                                                                                </span>
                                                                                {!! $key !!} ...
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- END Permission Default Seeder Checks -->
                                                        
                                                        <!-- START Role Default Seeder Checks -->
                                                        <div class="">
                                                            <div class="text-left" id="checkRolesDefaultSeederMigrations">
                                                            <h5 class="mb-0">
                                                                <button class="btn d-inline-block w-100 btn-link text-left btn-sm pt-3 pb-3 mb-0 mt-0" type="button" data-toggle="collapse" data-target="#collapseCheckRolesDefaultSeederMigrations" aria-expanded="true" aria-controls="collapseCheckRolesDefaultSeederMigrations">
                                                                    <span class="pull-right">
                                                                        @if ($status_checks['roles_default_seeder_checks_total'])
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-times text-danger"></i>
                                                                        @endif
                                                                    </span>
                                                                    Role Default DB Seeder...
                                                                </button>
                                                            </h5>
                                                            </div>

                                                            <div id="collapseCheckRolesDefaultSeederMigrations" class="collapse" aria-labelledby="checkRolesDefaultSeederMigrations" data-parent="#statusChecks">
                                                                <div class="card-body">

                                                                    @foreach($status_checks['roles_default_seeder_checks'] as $key => $check)
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <span class="pull-right">
                                                                                    @if ($check)
                                                                                        <i class="fas fa-check text-success"></i>
                                                                                    @else
                                                                                        <i class="fas fa-times text-danger"></i>
                                                                                    @endif
                                                                                </span>
                                                                                {!! $key !!} ...
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- END Role Default Seeder Checks -->
                                                        
                                                        <!-- START System Settings Default Seeder Checks -->
                                                        <div class="">
                                                            <div class="text-left" id="checkSystemSettingsDefaultSeederMigrations">
                                                            <h5 class="mb-0">
                                                                <button class="btn d-inline-block w-100 btn-link text-left btn-sm pt-3 pb-3 mb-0 mt-0" type="button" data-toggle="collapse" data-target="#collapseCheckSystemSettingsDefaultSeederMigrations" aria-expanded="true" aria-controls="collapseCheckSystemSettingsDefaultSeederMigrations">
                                                                    <span class="pull-right">
                                                                        @if ($status_checks['settings_default_seeder_checks_total'])
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-times text-danger"></i>
                                                                        @endif
                                                                    </span>
                                                                    System Settings Default DB Seeder...
                                                                </button>
                                                            </h5>
                                                            </div>

                                                            <div id="collapseCheckSystemSettingsDefaultSeederMigrations" class="collapse" aria-labelledby="checkSystemSettingsDefaultSeederMigrations" data-parent="#statusChecks">
                                                                <div class="card-body">

                                                                    @foreach($status_checks['settings_default_seeder_checks'] as $key => $check)
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <span class="pull-right">
                                                                                    @if ($check)
                                                                                        <i class="fas fa-check text-success"></i>
                                                                                    @else
                                                                                        <i class="fas fa-times text-danger"></i>
                                                                                    @endif
                                                                                </span>
                                                                                {!! $key !!} ...
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- END System Settings Default Seeder Checks -->
                                                        
                                                        <!-- START Menus Default Seeder Checks -->
                                                        <div class="">
                                                            <div class="text-left" id="checkMenusDefaultSeederMigrations">
                                                            <h5 class="mb-0">
                                                                <button class="btn d-inline-block w-100 btn-link text-left btn-sm pt-3 pb-3 mb-0 mt-0" type="button" data-toggle="collapse" data-target="#collapseCheckMenusDefaultSeederMigrations" aria-expanded="true" aria-controls="collapseCheckMenusDefaultSeederMigrations">
                                                                    <span class="pull-right">
                                                                        @if ($status_checks['menus_default_seeder_checks_total'])
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-times text-danger"></i>
                                                                        @endif
                                                                    </span>
                                                                    Menus Default DB Seeder...
                                                                </button>
                                                            </h5>
                                                            </div>

                                                            <div id="collapseCheckMenusDefaultSeederMigrations" class="collapse" aria-labelledby="checkMenusDefaultSeederMigrations" data-parent="#statusChecks">
                                                                <div class="card-body">

                                                                    @foreach($status_checks['menus_default_seeder_checks'] as $key => $check)
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <span class="pull-right">
                                                                                    @if ($check)
                                                                                        <i class="fas fa-check text-success"></i>
                                                                                    @else
                                                                                        <i class="fas fa-times text-danger"></i>
                                                                                    @endif
                                                                                </span>
                                                                                {!! $key !!} ...
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- END Menus Default Seeder Checks -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="tab-pane" id="configuration">
                                
                            </div>
                            <div class="tab-pane" id="review-configuration">
                                
                            </div>
                            <div class="tab-pane" id="finish">
                                
                            </div>
                        </div>
                        <div class="wizard-footer">
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' value='Finish' />

                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        
        </div>

    </div>
</div>
@endsection