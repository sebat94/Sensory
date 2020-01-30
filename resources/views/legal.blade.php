@extends('master')

@section('styles')

@endsection

@section('body')
  <section class="section_acordeon">

    <dl>
      <dt class="faq_active">Lorem ipsum dolor sit amet, consectetur</dt>
      <dd>
        <h2>Lorem ipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus fuga velit magnam voluptas, tenetur, animi eos asperiores, dicta, quasi pariatur! Asperiores quidem, alias delectus nobis doloremque beatae recusandae, iusto, impedit maiores molestiae necessitatibus iste vel laudantium quas cumque aperiam amet ducimus cum et suscipit provident culpa officia. Enim soluta officia vitae sapiente. Accusantium non, laboriosam earum animi corrupti. Nam?</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, unde quae? Repellendus provident, eum neque, esse pariatur ducimus maiores odio at, quo quod similique dolorum ullam. Placeat quia iste rerum repellat voluptate ex commodi itaque, eius harum corporis deserunt nobis.</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aliquam ea recusandae temporibus maiores dolorem provident omnis iusto laboriosam tempore.</p>
        <div class="triangulo_finalizar"></div>
      </dd>


      <dt>Lorem ipsum dolor sit amet, consectetur adipisicing elit</dt>
      <dd>
        <h2>Lorem ipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus fuga velit magnam voluptas, tenetur, animi eos asperiores, dicta, quasi pariatur! Asperiores quidem, alias delectus nobis doloremque beatae recusandae, iusto, impedit maiores molestiae necessitatibus iste vel laudantium quas cumque aperiam amet ducimus cum et suscipit provident culpa officia. Enim soluta officia vitae sapiente. Accusantium non, laboriosam earum animi corrupti. Nam?</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aliquam ea recusandae temporibus maiores dolorem provident omnis iusto laboriosam tempore.</p>
        <div class="triangulo_finalizar"></div>
      </dd>


      <dt>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, esse</dt>
      <dd>
        <h2>Lorem ipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus fuga velit magnam voluptas, tenetur, animi eos asperiores, dicta, quasi pariatur! Asperiores quidem, alias delectus nobis doloremque beatae recusandae, iusto, impedit maiores molestiae necessitatibus iste vel laudantium quas cumque aperiam amet ducimus cum et suscipit provident culpa officia. Enim soluta officia vitae sapiente. Accusantium non, laboriosam earum animi corrupti. Nam?</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, unde quae? Repellendus provident, eum neque, esse pariatur ducimus maiores odio at, quo quod similique dolorum ullam. Placeat quia iste rerum repellat voluptate ex commodi itaque, eius harum corporis deserunt nobis.</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A quasi, assumenda veritatis animi dicta excepturi ratione porro fugiat temporibus quod voluptatem vel ex, vitae at unde. Esse in nostrum omnis commodi eum aliquam, libero, voluptatum reiciendis beatae dolore neque, velit.</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aliquam ea recusandae temporibus maiores dolorem provident omnis iusto laboriosam tempore.</p>
        <div class="triangulo_finalizar"></div>
      </dd>


      <dt>Lorem ipsum dolor sit amet</dt>
      <dd>
        <h2>Lorem ipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus fuga velit magnam voluptas, tenetur, animi eos asperiores, dicta, quasi pariatur! Asperiores quidem, alias delectus nobis doloremque beatae recusandae, iusto, impedit maiores molestiae necessitatibus iste vel laudantium quas cumque aperiam amet ducimus cum et suscipit provident culpa officia. Enim soluta officia vitae sapiente. Accusantium non, laboriosam earum animi corrupti. Nam?</p>
        <div class="triangulo_finalizar"></div>
      </dd>


      <dt>Lorem ipsum dolor sit amet, consectetur</dt>
      <dd>
        <h2>Lorem ipsum</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti minus fuga velit magnam voluptas, tenetur, animi eos asperiores, dicta, quasi pariatur! Asperiores quidem, alias delectus nobis doloremque beatae recusandae, iusto, impedit maiores molestiae necessitatibus iste vel laudantium quas cumque aperiam amet ducimus cum et suscipit provident culpa officia. Enim soluta officia vitae sapiente. Accusantium non, laboriosam earum animi corrupti. Nam?</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, unde quae? Repellendus provident, eum neque, esse pariatur ducimus maiores odio at, quo quod similique dolorum ullam. Placeat quia iste rerum repellat voluptate ex commodi itaque, eius harum corporis deserunt nobis.</p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aliquam ea recusandae temporibus maiores dolorem provident omnis iusto laboriosam tempore.</p>
        <div class="triangulo_finalizar"></div>
      </dd>
    </dl>

  </section><!-- section_acordeon -->
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('li.menu_item').removeClass('menu_active');
    });
  </script>
@endsection
