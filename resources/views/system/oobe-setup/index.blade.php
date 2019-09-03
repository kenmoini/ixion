@extends('system.partials.skinny-template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">Ixion Initial Setup</h1>
            <p class="lead">Welcome to your new engagement platform!  We're still unpacking - in just a few moments we'll have everything ready to rock n' roll.</p>
            <p>Could you answer a few questions?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                    <div class="card-header">Status Check</div>

                    <div class="card-body">
                        Check for default settings...
                        Check for default permissions...
                        Check for default roles...
                        Check for default menus...

                        Check for configuration file... .ixion-config
                    </div>
            </div>
        </div>

        <div class="col-sm-12">
            <hr class="mb-4 pb-3" />
        </div>

        <div class="col-sm-12">
            <div class="card">
                    <div class="card-header">Service Configuration</div>

                    <div class="card-body">
                        Service Hostnames & Creds...pull from .env
                    </div>
            </div>
        </div>

        <div class="col-sm-12">
            <hr class="mb-4 pb-3" />
        </div>

        <div class="col-sm-12">
            <div class="card">
                    <div class="card-header">System Configuration</div>

                    <div class="card-body">
                    </div>
            </div>
        </div>


    </div>
</div>
@endsection