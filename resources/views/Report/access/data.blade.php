<style>
    .huge {
        font-size: 18px;
    }

    .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: white;
        background-color: #5cb85c;
    }
    .panel-blue > .panel-heading {
        border-color: #4e859a;
        color: white;
        background-color: #4e859a;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">  

            <div class="row">
                <div class="col-lg-4">  
                    <div class="panel panel-blue" style="margin-bottom: 0px;">
                        <div class="panel-heading" style="height: 100px;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-md-9 col-md-9 col-sm-9 text-right">
                                    <div class="huge">Personas en el Mes<br></div>
                                    <div> <p>Total {{$total}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">  
                    <div class="panel panel-green" style="margin-bottom: 0px;">
                        <div class="panel-heading" style="height: 100px;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-md-9 col-md-9 col-sm-9 text-right">
                                    <div class="huge">Personas actuales<br></div>
                                    <div> <p>Total {{$current}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-green" style="margin-bottom: 0px;">
                        <div class="panel-heading" style="height: 100px;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-md-9 col-md-9 col-sm-9 text-right">
                                    <div class="huge">Area mas visitada<br></div>
                                    <div> <p>Total {{$current}}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>