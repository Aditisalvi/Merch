<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="http://localhost/Merchandise/Common/Styles/script.js"></script>
    <script src="http://localhost/Merchandise/Common/Styles/body1.js"></script>
    <script src="http://localhost/Merchandise/Common/Styles/script2.js"></script>
    <script src="http://localhost/Merchandise/Common/Styles/table.js"></script>
    <script src="http://localhost/Merchandise/Common/Styles/table1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="http://localhost/Merchandise/Common/Styles/style.css">
    <link rel="stylesheet" href="http://localhost/Merchandise/Common/Styles/style1.css">
    <link rel="stylesheet" href="http://localhost/Merchandise/Common/Styles/style2.css">
</head>


<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
      <div class="app-header">
        <div class="app-header-left">
          <div class="p app-icon" id="aside-toggle-btn">
          </div>
          <p class="app-name">Admin Dashboard</p>
          <div class="search-wrapper">
            <input class="search-input" type="text" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search"
              viewBox="0 0 24 24">
              <defs></defs>
              <circle cx="11" cy="11" r="8"></circle>
              <path d="M21 21l-4.35-4.35"></path>
            </svg>
          </div>
        </div>
        <div class="app-header-right">
          <!-- <button class="mode-switch" title="Switch Theme" id="color-scheme-selector">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
          <button class="add-btn" title="Add New Project">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-plus">
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
          </button>
          <button class="notification-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
          </button> -->
          <button class="profile-btn">
            <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" />

          </button>
        </div>
        <button class="messages-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-message-circle">
            <path
              d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
          </svg>
        </button>
      </div>
    </div>
    <div style="padding-top: 1rem;width: 100%;float:right">

      <!-- === wrapper section === -->
      <section id="wrapper" class="d-flex w-100">
        <!-- aside nav-->
        <aside class="border-right shadow-sm background text" id="aside-nav">
          <div id="side-nav">
            <!-- aside nav ul list -->
            <ul class="nav flex-column" id="aside-nav-ul">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-sliders align-middle">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                  </svg>
                  <span style="font-size: 18px;" class="ms-2">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/?page=product">
                <i class="nav-icon fas fa-book-open" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Book List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/?page=inventory">
                <i width="20px"class="nav-icon fas fa-clipboard-list" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">&nbsp;Inventory List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/?page=orders">
                <i class="nav-icon fas fa-list" style="font-size: 18px;"></i>
                <span style="font-size: 18px;" class="ms-2">Order List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/?page=maintenance/category">
                <i class="nav-icon fas fa-th-list" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Category List</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>admin/?page=maintenance/sub_category">
                  <i class="nav-icon fas fa-th-list" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Sub Category List</span>
                </a>
              </li>
            </ul>
            <!-- /aside nav ul list -->
          </div>
        </aside>
        <main class="w-100 d-flex flex-column" id="main">
          <section class="container-fluid">

