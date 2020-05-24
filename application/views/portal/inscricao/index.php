

<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Inscrições</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   <main class= "col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3"> 

    <!--<h1> inscrição jogadores</h1>
 
    <section class="row mt-3 mb-3">
        <div class="col-12 col-sm-12">
            <?= anchor('Portal_home', 'Voltar para pagina principal', ['title' => 'voltar para pagina principal', 'class'=> 'btn btn-primary']) ?>
        </div>    
    </section>-->

    

    
      <!-- <div class="form-group col-md-3>  --> 
            <?= form_open_multipart() ?>
            
                <div class="form-group col-md-3 align: center">
                    <?= form_label('Nome do time' )?>
                    <?= form_input([
                        'type' =>'text',
                        'class' =>'form-control',
                        'name' =>'nomeEquipe',
                        'placeholder' =>'nome do time'
                        ])?>
                </div>
                               
                <div class="form-group col-md-3">                    
                        <?= form_label('WhatsApp do capitao')?>
                        <?= form_input([
                        'type' =>'text',
                        'class' =>'form-control',
                        'name' =>'whatsapp',
                        'placeholder' =>'WhatsApp do capitao'
                        ])?>                    
                </div>
                
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 1</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do jogador 1')?>
                            <?= form_input([ 'type' =>'text','class' =>'form-control','name' =>'nome1','placeholder' =>'nome do jogador 1' ])?>
                        </div>    
                        <div class="form-group col-md-6"> 
                            <?= form_label('Nick jogador 1')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick1','placeholder' =>'nick do jogador 1'])?>
                        </div>               
                        <div class="form-group col-md-6">
                            <?= form_label('Função do jogador 1')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao1','placeholder' =>'Função do jogador 1' ])?>
                        </div>          
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 1')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link1','placeholder' =>'link do perfil jogador 1'])?>
                        </div>    
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 1')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto1','placeholder' =>'adicionar foto do jogador 1'])?>
                        </div> 
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">          
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 2</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do jogador 2')?>
                            <?= form_input(['type' =>'text','class' =>'form-control col-sm-24S','name' =>'nome2','placeholder' =>'nome do jogador 2'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick jogador 2')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick2','placeholder' =>'nick do jogador 2 '])?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('Função do jogador 2')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao2','placeholder' =>'Função do jogador 2'])?>
                        </div>  
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 2')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link2','placeholder' =>'link do perfil jogador 2' ])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 2')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto2','placeholder' =>'adicionar foto do jogador 2'])?>
                        </div>     
                    </div>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">         
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 3</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do jogador 3')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome3','placeholder' =>'nome do jogador 3'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick jogador 3')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick3','placeholder' =>'nick do jogador 3'])?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('Função do jogador 3')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao3','placeholder' =>'Função do jogador 3'])?>
                        </div>  
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 3')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link3','placeholder' =>'link do perfil jogador 3'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 3')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto3','placeholder' =>'adicionar foto do jogador 3'])?>
                        </div>  
                    </div>
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">     
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 4</h1> 
                            <div class="form-group col-md-6">
                                <?= form_label('Nome do jogador 4')?>
                                <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome4','placeholder' =>'nome do jogador 4'])?>
                            </div>        
                            <div class="form-group col-md-6">
                                <?= form_label('Nick jogador 4')?>
                                <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick4','placeholder' =>'nick do jogador 4'
                                ])?>
                            </div>
                            <div class="form-group col-md-6">
                                <?= form_label('Função do jogador 4')?>
                                <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao4','placeholder' =>'Função do jogador 4'])?>
                            </div>  
                            <div class="form-group col-md-6">
                                <?= form_label('link do perfil jogador 4')?>
                                <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link4','placeholder' =>'link do perfil jogador 4' ])?>
                            </div>        
                            <div class="form-group col-md-6">
                                <?= form_label('foto do jogador 4')?>
                                <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto4','placeholder' =>'adicionar foto do jogador 4'])?>
                            </div> 
                    </div>
                </div>
            </div>  
        </div>    
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">             
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 5</h1> 
                        <div class="form-group col-md-6" >
                            <?= form_label('Nome do jogador 5')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome5','placeholder' =>'nome do jogador 5'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick jogador 5')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick5','placeholder' =>'nick do jogador 5'])?>
                        </div>
                        <div class="form-group col-md-6 "> 
                            <?= form_label('Função do jogador 5')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao5','placeholder' =>'Função do jogador 5'])?>
                        </div>  
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 5')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link5','placeholder' =>'link do perfil jogador 5' ])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 5')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto5','placeholder' =>'adicionar foto do jogador 5'])?>
                        </div>  
                    </div>    
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">         
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 6 (reserva)</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do jogador 6')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome6','placeholder' =>'nome do jogador 6'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick jogador 6')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick6', 'placeholder' =>'nick do jogador 6' ])?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('Função do jogador 6')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao6','placeholder' =>'Função do jogador 6'])?>
                        </div>  
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 6')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link6','placeholder' =>'link do perfil jogador 6'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 6')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto6','placeholder' =>'adicionar foto do jogador 6'])?>
                        </div>   
                    </div>    
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">             
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> jogador 7 (reserva)</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do jogador 7')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome7','placeholder' =>'nome do jogador 7' ])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick jogador 7')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick7','placeholder' =>'nick do jogador 7'])?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('Função do jogador 7')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'funcao7','placeholder' =>'Função do jogador 7' ])?>
                        </div>  
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil jogador 7')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link7','placeholder' =>'link do perfil jogador 7'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do jogador 7')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto7','placeholder' =>'adicionar foto do jogador 7'
                            ])?>
                        </div>  
                    </div>
                </div>
            </div>            
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">     
                        <h1 class="p-3 mb-2 bg-danger col-md-6"> Coach</h1> 
                        <div class="form-group col-md-6">
                            <?= form_label('Nome do Coach ')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nome8','placeholder' =>'nome do coach'])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('Nick do coach ')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'nick8','placeholder' =>'nick do coach'])?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= form_label('link do perfil coach')?>
                            <?= form_input(['type' =>'text','class' =>'form-control','name' =>'link8','placeholder' =>'link do perfil coach '])?>
                        </div>        
                        <div class="form-group col-md-6">
                            <?= form_label('foto do coach')?>
                            <?= form_input(['type' =>'file','class' =>'form-control','name' =>'foto8','placeholder' =>'adicionar foto do coach'])?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>                                                                                                                                                                                                                               
                
            <?= form_close() ?>    
        </div>
    </div>
</main>        