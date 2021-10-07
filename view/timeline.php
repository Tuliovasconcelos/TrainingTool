<?php
function exibe_timeline()
{
    require './model/perguntas_model.php';


    echo '<!-- Timelime example  -->
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
                <div class="time-label">
                    <span class="bg-green">Agendar <i class="fas fa-check"></i></span>
                </div>
    
                <div>
                    <i class="fas fa-video bg-primary"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                        <div id="accordion">
    
                        </div>
                        <h3 class="timeline-header"><a data-toggle="collapse" href="#collapseVideo1">Vídeo tutorial</a>
                        </h3>
                        <div id="collapseVideo1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="timeline-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
    
                <div>
                    <i class="fas fa-align-left bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
    
                        <h3 class="timeline-header"><a data-toggle="collapse" href="#collapseTeste1">Teste de
                                conhecimento</a></h3>
                        <div id="collapseTeste1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title"><i>Instruções/Observações</i></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <p class="lead">
                </p>
                <p>
                    1º - Este teste é composto por 18 questões envolvendo todo o conhecimento repassado nos treinamentos
                    dos
                    sistemas/processos utilizados na empresa.</p>
                <p>
                    2º - Será medido o nível de conhecimento através de questões abertas envolvendo processos e
                    situações
                    que
                    podem ocorrer na rotina.</p>
                <p>
                    3º - A avaliação servirá para medir necessidade de melhorias no processo de treinamento e avaliação
                    técnica do colaborador.</p>

                <p>
                    4º - Qualquer dúvida durante o teste, deverá ser solicitada a atenção do avaliador. Obrigado por
                    contribuir com a Prontomed. Vamos la!</p>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>O que você deve fazer quando o beneficiário chegar para a
                                                        consulta?</label>
                                                    <textarea class="form-control" rows="3"
                                                        placeholder="Digite sua resposta..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm">Enviar</a>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                </div>
    
                <!-- outro tópico -->
                <div class="time-label">
                    <span class="bg-primary">Consultar <i class="fas fa-clock"></i></span>
                </div>
    
                <div>
                    <i class="fas fa-video bg-primary"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                        <div id="accordion">
    
                        </div>
                        <h3 class="timeline-header"><a data-toggle="collapse" href="#collapseVideo2">Vídeo tutorial</a>
                        </h3>
                        <div id="collapseVideo2" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="timeline-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
    
                <div>
                    <i class="fas fa-align-left bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
    
                        <h3 class="timeline-header"><a data-toggle="collapse" href="#collapseTeste2">Teste de
                                conhecimento</a></h3>
                        <div id="collapseTeste2" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title">Sobre as consultas me informe:</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>O que você deve fazer quando o beneficiário chegar para a
                                                        consulta?</label>
                                                    <textarea class="form-control" rows="3"
                                                        placeholder="Digite sua resposta..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm">Enviar</a>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                </div>
    
                <div>
                    <i class="fas fa-check bg-gray"></i>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    ';
}
