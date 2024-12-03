<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HusayHub | A JRU-Centric Platform</title>
    <!-- IconScout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <script defer src="{{ asset('js/index.js') }}"></script>

</head>
<body>
    <nav>
        <div class="container">
            <h2 class="logo">
                HusayHub
            </h2>
            
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Search for communities, tutorials or projects.">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="create-post">Create Community</label>
                <div class="profile-photo">
                    <img src="./images/profile-1.jpg" alt="">
                </div>
            </div>
        </div>
    </nav>

    <!-------------------------------- MAIN ----------------------------------->
    <main>
        <div class="container">
            <!----------------- LEFT -------------------->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg">
                    </div>
                    <div class="handle">
                        <h4>{{ $user->display_name }}</h4>
                        <p class="text-muted">{{ $user->email}}</p>
                    </div>
                </a>

                <!----------------- SIDEBAR -------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>   
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-compass"></i></span>
                        <h3>Explore</h3>
                    </a>
                    <a class="menu-item"  id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span>
                        <h3>Notification</h3>
                        <!--------------- NOTIFICATION POPUP --------------->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-2.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Robert Caesar Malabed</b> accepted your friend request
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-3.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Bea Elaine Sapigao</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-4.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>12-345678</b> and <b>283 Others</b> liked your post
                                    <small class="text-muted">4 Minutes Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-5.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>21-261213</b> commented on a post you are tagged in
                                    <small class="text-muted">2 Days Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-6.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Chauncey Santos</b> commented on a post you are tagged in
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-7.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Christoper Yap</b> commented on your post
                                    <small class="text-muted">1 Hour Ago</small>
                                </div>
                            </div>
                        </div>
                        <!--------------- END NOTIFICATION POPUP --------------->
                    </a>
                    <a class="menu-item" id="messages-notifications">
                        <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span>
                        <h3>Messages</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-bookmark"></i></span>
                        <h3>Bookmarks</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-file-info-alt"></i></span>
                        <h3>Courses Enrolled</h3>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Setting</h3>
                    </a>
                </div>
                <!----------------- END OF SIDEBAR -------------------->
                <label class="btn btn-primary" for="create-post">Create Post</label>
            </div>

            <div class="container">
                <div class="middle">
                    <!-- Create Post Form -->
                    <form action="{{ route('posts.store') }}" method="POST" class="create-post">
                        @csrf
                        <div class="profile-photo">
                            <img src="{{ $user->profile_photo ?? asset('images/default-profile.jpg') }}" alt="User Photo">
                        </div>
                        <input type="text" name="content" placeholder="What's on your mind?" id="create-post" required>
                        <input type="submit" value="Post" class="btn btn-primary">
                    </form>

                    <!-- Feeds -->
                    <div class="feeds">
                        <!-- Loop over each post -->
                        @foreach($posts as $post)
                            <div class="feed">
                                <div class="head">
                                    <div class="user">
                                        <div class="profile-photo">
                                            <img src="./images/profile-15.jpg" alt="Profile Photo">
                                        </div>
                                        <div class="info">
                                            <h3>{{ $post->user->display_name }}</h3>
                                            <small>{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <span class="edit">
                                        <i class="uil uil-ellipsis-h"></i>
                                    </span>
                                </div>

                                <div class="photo">
                                    <img src="./images/profile-15.jpg" alt="Post Image">
                                </div>

                                <div class="action-buttons">
                                    <div class="interaction-buttons">
                                        <span><i class="uil uil-heart"></i></span>
                                        <span><i class="uil uil-comment-dots"></i></span>
                                        <span><i class="uil uil-share-alt"></i></span>
                                    </div>
                                    <div class="bookmark">
                                        <span><i class="uil uil-bookmark-full"></i></span>
                                    </div>
                                </div>

                                <div class="liked-by">
                                    <span><img src="./images/profile-10.jpg"></span>
                                    <span><img src="./images/profile-4.jpg"></span>
                                    <span><img src="./images/profile-15.jpg"></span>
                                    <p>Liked by <b>23-261213</b> and <b>2, 323 others</b></p>
                                </div>

                                <div class="caption">
                                    <p><b>{{ $post->user->display_name }}</b> {{ $post->content }}</p>
                                </div>

                                <div class="comments text-muted">
                                    View all {{ $post->comments_count }} comments
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

             <!----------------- END OF MIDDLE -------------------->

            <!----------------- RIGHT -------------------->
            <div class="right">
                <!------- MESSAGES ------->
                <div class="messages">
                    <div class="heading">
                        <h4>Communities</h4>
                    </div>
                    <!------- SEARCH BAR ------->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search Communities" id="message-search">
                    </div>
                    <!------- MESSAGES CATEGORY ------->
                    <div class="category">
                        <h6 class="active">Followed</h6>
                        <h6>Explore</h6>
                        <h6 class="message-requests">Liked (7)</h6>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-17.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Javascript</h5>
                            <p class="text-muted">A group for Javascript Students.</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-6.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Laravel</h5>
                            <p class="text-muted">Ask about PHP Laravel-topics.</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-8.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Data Analysis</h5>
                            <p class="text-muted">Ask about Excel-Python topics. </p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-10.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Database</h5>
                            <p class="text-muted">MySQL/Oracle Community.</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Java</h5>
                            <p class="text-muted">Online Tutorials for Java.</p>
                        </div>
                    </div>
                    <!------- MESSAGES ------->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-15.jpg">
                        </div>
                        <div class="message-body">
                            <h5>3D/Animation</h5>
                            <p class="text-muted">A Place for animating.</p>
                        </div>
                    </div>
                </div>
                <!------- END OF MESSAGES ------->

                <!------- FRIEND REQUEST ------->
                <div class="friend-requests">
                    <h4>Requests</h4>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./images/profile-20.jpg">
                            </div>
                            <div>
                                <h5>Robert Caesar Malabed</h5>
                                <p class="text-muted">4 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./images/profile-18.jpg">
                            </div>
                            <div>
                                <h5>23-121426</h5>
                                <p class="text-muted">2 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./images/profile-17.jpg">
                            </div>
                            <div>
                                <h5>21-252412</h5>
                                <p class="text-muted">5 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn">
                                Decline
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------- END OF RIGHT -------------------->
        </div>
    </main>

    <!----------------- THEME CUSTOMIZATION -------------------->
    <div class="customize-theme">
        <div class="card">
            <h2>Customize your view</h2>
            <p class="text-muted">Manage your font size, color, and background</p>

            <!----------- FONT SIZE ----------->
            <div class="font-size">
                <h4>Font Size</h4>
                <div>
                    <h6>Aa</h6>
                    <div class="choose-size">
                        <span class="font-size-1"></span>
                        <span class="font-size-2 active"></span>
                        <span class="font-size-3"></span>
                        <span class="font-size-4"></span>
                        <span class="font-size-5"></span>
                    </div>
                    <h3>Aa</h3>
                </div>
            </div>

            <!----------- PRIMARY COLORS ----------->
            <div class="color">
                <h4>Color</h4>
                <div class="choose-color">
                    <span class="color-1 active"></span>
                    <span class="color-2"></span>
                    <span class="color-3"></span>
                    <span class="color-4"></span>
                    <span class="color-5"></span>
                </div>
            </div>

            <!----------- BACKGROUND COLORS ----------->
            <div class="background">
                <h4>Background</h4>
                <div class="choose-bg">
                    <div class="bg-1 active">
                        <span></span>
                        <h5 for="bg-1">Light</h5>
                    </div>
                    <div class="bg-2">
                        <span></span>
                        <h5 for="bg-2">Dim</h5>
                    </div>
                    <div class="bg-3">
                        <span></span>
                        <h5 for="bg-3">Dark</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>