<?php
session_start();

if (isset($_SESSION['admin']) && $_SESSION['loggedin'] == true) {
    

    
}
else{
    header("Location: ../index.php");
}

// Rest of your protected page content goes here
?><script src="sweet.js"></script>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">CAMPUS SYNC</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Student</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_sudent.php" class="menu-link">
                    <div data-i18n="Without menu">Add student</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_student.php" class="menu-link">
                    <div data-i18n="Without navbar">View student</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_student_enrollement.php" class="menu-link">
                    <div data-i18n="Container">Add student enrollement</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">PROFESSOR</span>
            </li> -->
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Professor</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="view_professor.php" class="menu-link">
                    <div data-i18n="Account">View Professor</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_professor.php" class="menu-link">
                    <div data-i18n="Account">Add Professor</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_professor_subject.php" class="menu-link">
                    <div data-i18n="Notifications">Add professor subject</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_professor_subject.php" class="menu-link">
                    <div data-i18n="Connections">View professor subjects</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Departments</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_department.php" class="menu-link">
                    <div data-i18n="Error">Add department</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_department.php" class="menu-link">
                    <div data-i18n="Under Maintenance">View departments</div>
                  </a>
                </li>
              </ul>
            </li>
            
            
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Courses</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_course.php" class="menu-link">
                    <div data-i18n="Error">Add course</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_course.php" class="menu-link">
                    <div data-i18n="Under Maintenance">View courses</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Components -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li> -->
            <!-- Cards -->
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Subjects</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_subject.php" class="menu-link">
                    <div data-i18n="Without menu">Add subject</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_subject.php" class="menu-link">
                    <div data-i18n="Without navbar">View subject</div>
                  </a>
                </li>
                
              </ul>
            </li>


            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Exam</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_exam.php" class="menu-link">
                    <div data-i18n="Accordion">Add exam</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_exam_schedule.php" class="menu-link">
                    <div data-i18n="Alerts">Add exam schedule</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_exam_schedule.php" class="menu-link">
                    <div data-i18n="Badges">Update exam schedule</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_exam_schedule.php" class="menu-link">
                    <div data-i18n="Buttons">View exam schedule</div>
                  </a>
                </li>
              </ul>
            </li>

 <!-- Cards -->
 <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Batches</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_batch.php" class="menu-link">
                    <div data-i18n="Without menu">Add Batches</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_batch.php" class="menu-link">
                    <div data-i18n="Without navbar">View Batches</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <!-- Extended components -->
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Classes</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_class.php" class="menu-link">
                    <div data-i18n="Error">Add class</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_class.php" class="menu-link">
                    <div data-i18n="Under Maintenance">View Classes</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Timetables</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_timetable.php" class="menu-link">
                    <div data-i18n="Error">Add timetables</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_timetable.php" class="menu-link">
                    <div data-i18n="Under Maintenance">View timetables</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Manage Fees</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_fees.php" class="menu-link">
                    <div data-i18n="Input groups">Add Fees</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_fees.php" class="menu-link">
                    <div data-i18n="Basic Inputs">View Fees</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Basic Inputs">Fees reports</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Companys</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_company.php" class="menu-link">
                    <div data-i18n="Without menu">Add company</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_company.php" class="menu-link">
                    <div data-i18n="Without navbar">View company</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- Forms & Tables -->
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li> -->
            <!-- Forms -->
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">H.O.D</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="assign_hod.php" class="menu-link">
                    <div data-i18n="Input groups">Add H.O.D</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="view_hod.php" class="menu-link">
                    <div data-i18n="Basic Inputs">View H.O.D</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Notifications</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="add_mail.php" class="menu-link">
                    <div data-i18n="Without menu">Send Mail</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_mail_deptwise.php" class="menu-link">
                    <div data-i18n="Without navbar">Department Wise</div>
                  </a>
                </li>
               
                
              </ul>
            </li>
            <li class="menu-item">
              <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Reports</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="student_report.php" class="menu-link">
                    <div data-i18n="Without menu">Student Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="professor_report.php" class="menu-link">
                    <div data-i18n="Without navbar">Professor Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="company_report.php" class="menu-link">
                    <div data-i18n="Without navbar">Company Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="class_wise_report.php" class="menu-link">
                    <div data-i18n="Without navbar">Class Wise Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="professor_subject_report.php" class="menu-link">
                    <div data-i18n="Without navbar">Professor Subject Reports</div>
                  </a>
                </li>
              </ul>
            </li>
          
            <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li> -->
            
            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                <span class="fw-semibold d-block">Welcome Back Admin!</span>
                   
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                   
                   
                    <li>
                      <a class="dropdown-item" href="../index.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <!-- Content wrapper -->
          <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script>
  window.botpressWebChat.init({
      "composerPlaceholder": "Chat with Campus-Sync Admin Assist",
      "botConversationDescription": "This chatbot was built surprisingly fast with Botpress",
      "botId": "a45bf708-fc30-4b15-b497-3ad0248b6a35",
      "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
      "messagingUrl": "https://messaging.botpress.cloud",
      "clientId": "a45bf708-fc30-4b15-b497-3ad0248b6a35",
      "webhookId": "c046608d-1abe-4b93-af8e-d5b8aedd446a",
      "lazySocket": true,
      "themeName": "prism",
      "botName": "Campus-Sync Admin Assist",
      "frontendVersion": "v1",
      "useSessionStorage": true,
      "enableConversationDeletion": true,
      "theme": "prism",
      "themeColor": "#2563eb"
  });
</script>