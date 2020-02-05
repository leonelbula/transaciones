    

<main class="site-main">


    <!--  ======================= Start Banner Area =======================  -->
    <section class="site-banner">
        <div class="container">
            <div class="row">
				<?php 
					$detallesContenido = homeController::Contenido();
					while ($row2 = $detallesContenido ->fetch_object()) :						
					
				?>
                <div class="col-lg-6 col-md-12 site-title">
                    <h3 class="title-text"><?=$row2->titulo1?></h3>
                    <h1 class="title-text text-uppercase"><?=$row2->titulo2?></h1>
                    <h4 class="title-text text-uppercase"><?=$row2->titulo3?> </h4>
                    <div class="site-buttons">

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 banner-image">
                    <img src="<?= URL_BASE ?>assets/img/banner/<?=$row2->img?>" alt="banner-img" class="img-fluid">
                </div>
				<?php endwhile; ?>
            </div>
        </div>
    </section>
    <!--  ======================= End Banner Area =======================  -->



    <!--  ======================== Brand Area ==============================  -->

    <section class="brand-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="first-row row">
						<?php 
						$bancos = bancosController::Listabancos();
						while ($row1 = $bancos->fetch_object()) :							
						
						?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-brand">
                                <img src="<?= URL_ADMIN ?>/image/bancos/<?=$row1->img?>" alt="Brand-1 ">
                            </div>
                        </div>
						<?php endwhile; ?>
                        
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="experience-area">
                        <div class="modal-content ">
                            <div class="modal-header btn-primary">
                                <h5 class="modal-title" id="exampleModalLabel">Calculadora</h5>
                                
                            </div>
                            <div class="modal-body">
                                <form action="<?= URL_BASE ?>cuentas/guardar" method="POST" >
                                  
                                    <div class="form-group">
                                        <label>Banco</label>
                                        <select class="form-control select2 banco" style="width: 100%;" required name="banco">
                                            <option>Selecione un banco</option>
                                            <?php
                                            $listaBancos = bancosController::Listabancos();
                                            while ($row = $listaBancos->fetch_object()) :
												
                                               ?>
                                               <option value="<?= $row->tasa ?>"><?= $row->nombre ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Valor</label>
                                        <input type="number" class="form-control valor" id="valor" name="valor" required value="20000">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bolivares</label>
                                        <input type="text" class="form-control" id="" name="totalvalor" required value="0" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tasa</label>
                                        <input type="text" class="form-control" id="" name="totalvalor" required value="0.051" readonly>
                                    </div>                                     
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!--  ======================== End Brand Area ==============================  -->

    <!--  ====================== Start Services Area =============================  -->
<!--
    <section class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center services-title">
                    <h1 class="text-uppercase title-text">Nuestro servicios</h1>                        
                </div>
            </div>
            <div class="container services-list">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="<?= URL_BASE ?>assets/img/services/s1.png" alt="Services-1">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">Wp developer</h5>
                                <p class="card-text text-secondary">
                                    Some quick example text to build on the card
                                    title and make up
                                    the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="<?= URL_BASE ?>assets/img/services/s2.png" alt="Services-2">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">ux/ui desing</h5>
                                <p class="card-text text-secondary">
                                    Some quick example text to build on the card
                                    title and make up
                                    the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="<?= URL_BASE ?>assets/img/services/s3.png" alt="Services-3">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">web design</h5>
                                <p class="card-text text-secondary">
                                    Some quick example text to build on the card
                                    title and make up
                                    the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="services">
                            <div class="sevices-img text-center py-4">
                                <img src="<?= URL_BASE ?>assets/img/services/s4.png" alt="Services-4">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-uppercase font-roboto">seo optimize</h5>
                                <p class="card-text text-secondary">
                                    Some quick example text to build on the card
                                    title and make up
                                    the bulk of the card's content.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!--  ====================== End Services Area =============================  -->


    <section class="about-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h1 class="text-uppercase title-h1">Lo  que nuestros cliente dicen de nosotros</h1>

                    </div>
                </div>
            </div>
        </div>

        <div class="container carousel py-lg-5">
            <div class="owl-carousel owl-theme">
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t1.jpg" alt="img1" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">John Martin</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t2.jpg" alt="img2" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Mac Hill</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t1.jpg" alt="img1" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">John Martin</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t2.jpg" alt="img2" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Mac Hill</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t1.jpg" alt="img1" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">John Martin</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="./img/testimonials/t2.jpg" alt="img2" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Mac Hill</h4>
                        <p class="para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem architecto
                            consequuntur ratione, obcaecati corrupti deserunt.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>


</main>
