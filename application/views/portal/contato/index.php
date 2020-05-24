<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner text-center">
            <div class="breadcrumb_iner_item">
              <h2>Contato</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding" style="background-color: #fff; padding: 85px 0px">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title" style="color: #000">Deixe aqui sua dúvida, sugestão ou um beijo pra gente!</h2>
          <p style="color: #8a8a8a">Pode ficar à vontate, você já faz parte da nossa família!</p>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button-contactForm btn_1">Send Message </button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fab fa-whatsapp"></i></span>
            <div class="media-body">
              <h3>Grupo Fanatics</h3>
              <p>Entra lá!</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fab fa-instagram"></i></span>
            <div class="media-body">
              <h3>Instagram</h3>
              <p>Segue lá!</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fab fa-facebook-square"></i></i></span>
            <div class="media-body">
              <h3>Facebook</h3>
              <p>Curti lá!</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>Nosso e-mail</h3>
              <p>contato@fanaticsgamefestival.com.br</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->