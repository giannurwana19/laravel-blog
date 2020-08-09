@include('template_blog.page_header')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div id="hot-post" class="row hot-post">
      <div class="col-md-8 hot-post-left">
        @yield('content')
      </div>
      @include('template_blog.widget')
    </div>
    <!-- /container -->
  </div>
  <!-- /SECTION -->

  @include('template_blog.footer')