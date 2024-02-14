<div class="sidebar" data-color="darken" data-background-color="white">
    <div class="logo"><a href="{{ route('dashboard') }}" class="simple-text logo-normal"><i
                class="material-icons">cast_for_education</i>
                SAVEDEE
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard/*') || Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('course/*') || Request::is('course') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('course.index') }}">
                    <i class="material-icons">school</i>
                    <p>หลักสูตร</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('quiz/*') || Request::is('quiz') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('quiz.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>แบบทดสอบ</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('question/*') || Request::is('question') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('question.index') }}">
                    <i class="material-icons">question_answer</i>
                    <p>คำถาม</p>
                </a>
            </li>
            {{-- <li class="nav-item {{ Request::is('student/*') || Request::is('student') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('student.index') }}">
                    <i class="material-icons">local_library</i>
                    <p>Student</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item {{ Request::is('rating/*') || Request::is('rating') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rating.index') }}">
                    <i class="material-icons">star_half</i>
                    <p>Rating</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('result/*') || Request::is('result') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('result.index') }}">
                    <i class="material-icons">emoji_events</i>
                    <p>View Result</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item  {{ Request::is('settings/*') || Request::is('settings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <i class="material-icons">settings</i>
                    <p>ตั้งค่า</p>
                </a>
            </li> --}}

            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
                    <i class="material-icons">settings</i>
                  <p> ตั้งค่า
                    <b class="caret"></b>
                  </p>
                </a>
              </li>
              <div class="collapse show" id="pagesExamples" style="">
                <ul class="nav">
                  <li class="nav-item {{ Request::is('slide/*') || Request::is('slide') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('slide.index') }}">
                      <span class="sidebar-normal"> ภาพสไลด์โชว์ </span>
                    </a>
                  </li>
                  <li class="nav-item {{ Request::is('blog/*') || Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog.index') }}">
                      <span class="sidebar-normal"> บทความ (รอบรู้เรื่องขับขี่) </span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/login.html">
                      <span class="sidebar-mini"> LP </span>
                      <span class="sidebar-normal"> Login Page </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/register.html">
                      <span class="sidebar-mini"> RP </span>
                      <span class="sidebar-normal"> Register Page </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/lock.html">
                      <span class="sidebar-mini"> LSP </span>
                      <span class="sidebar-normal"> Lock Screen Page </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/user.html">
                      <span class="sidebar-mini"> UP </span>
                      <span class="sidebar-normal"> User Profile </span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="../examples/pages/error.html">
                      <span class="sidebar-mini"> E </span>
                      <span class="sidebar-normal"> Error Page </span>
                    </a>
                  </li>
                </ul>
              </div>

            {{-- <li class="nav-item active-pro ">
          <a class="nav-link" href="./upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
          </a>
        </li> --}}
        </ul>

    </div>
</div>
