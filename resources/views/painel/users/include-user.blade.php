 <!-- <div class="row">  
                    <br>
                    <h4 id="center"><b>CADASTRO DOS DADOS DO USUARIO</b></h4>
                    <br>  -->
                    <form method="post" 
                          action="{{route('user.store')}}" 
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>                 
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="text" name="password" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="admin">Administrador</label>
                                <input value="true" id="admin" type="checkbox" name="admin" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>  --}}
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="admin" id="admin">
                            <label class="form-check-label" for="admin">Administrador</label>
                        </div>

                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Cadastrar
                            </button>
                        </div>
                    </form>             
               <!--  </div> -->
            