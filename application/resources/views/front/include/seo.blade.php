<title>{{ ucfirst($site->title)}} |  @yield('page_title', page_info(request()->segment(1)) ? page_info(request()->segment(1))->title : '' ) </title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="@yield('page_description', page_info(request()->segment(1)) ? page_info(request()->segment(1))->description : ''  ) " />
<meta name="keywords" content="@yield('page_tags', page_info(request()->segment(1)) ? page_info(request()->segment(1))->tags : ''  ) " />
