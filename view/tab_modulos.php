<?php
function exibe_tabModulos()
{
    require_once './view/timeline.php';
    echo '
    <div class="row col-md-12 col-xs-12 col-xs-12">
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card ">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-4">Selecione o treinamento :</h3>
                <ul class="nav nav-pills  p-3">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Agendamento</a>60%
                    </br> 
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete (warning)</span>
                        </div>
                    </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Manutenção</a>30%
                    </br> 
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <span class="sr-only">60% Complete (warning)</span>
                        </div>
                    </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Relatórios</a>20%
                    </br> 
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">60% Complete (warning)</span>
                        </div>
                    </div>
                    </li>
                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                            <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                            <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                        </div>
                    </li>
                    -->
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                    ';
    exibe_timeline();
    echo '
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        The European languages are members of the same family. Their separate existence is a myth.
                        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                        in their grammar, their pronunciation and their most common words. Everyone realizes why a
                        new common language would be desirable: one could refuse to pay expensive translators. To
                        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                        words. If several languages coalesce, the grammar of the resulting language is more simple
                        and regular than that of the individual languages.
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!-- /.col -->
</div>
    ';
}
