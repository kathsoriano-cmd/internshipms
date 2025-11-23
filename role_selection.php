<!DOCTYPE html>
<html>
<head>
    <title>Select Role</title>
    <link rel="stylesheet" type="text/css" href="css/role.css">
</head>
<body>

<div class="wrapper">
    <div class="card-container">

        <h2>Please select your role</h2>

        <p class="subtext">
            Lorem ipsum dolor sit amet consectetur. Faucibus mi congue augue purus
            et consequat purus pulvinar sed leo gravida etiam molestie.
        </p>

        <form method="POST" action="login.php">
            <div class="role-section">

                <!-- STUDENT -->
                <label class="role-card">
                    <input type="radio" name="role" value="student" required>

                    <div class="inner">
                        <div class="icon">
                            <!-- light grey student icon -->
                            <svg width="45" height="45" fill="midnightblue">
                                <path d="M22 4L2 12l20 8 20-8-20-8zm0 18l-14-6v10c0 6 8 10 14 10s14-4 14-10V16l-14 6z" />
                            </svg>
                        </div>
                        <p class="label-text">Student</p>
                    </div>
                </label>

                <!-- FACULTY (active selected design) -->
                <label class="role-card">
                    <input type="radio" name="role" value="faculty">

                    <div class="inner">
                        <div class="icon">
                            <!-- blue teacher icon -->
                            <svg width="45" height="45" fill="midnightblue">
                                <path d="M10 4h4v4h-4V4zm10 0h4v4h-4V4zm-6 6h20v4H14v-4zm0 6h14v4H14v-4zm-8 8v-4h4v4H6zm6 0v-4h4v4h-4zm6 0v-4h4v4h-4zm6 0v-4h4v4h-4z"/>
                            </svg>
                        </div>
                        <p class="label-text">Faculty</p>
                    </div>
                </label>

                <!-- STAFF -->
                <label class="role-card">
                    <input type="radio" name="role" value="staff">

                    <div class="inner">
                        <div class="icon">
                            <!-- grey ID staff icon -->
                            <svg width="45" height="45" fill="midnightblue">
                                <path d="M6 4h28v22H6V4zm6 4v2h16V8H12zm0 6v2h16v-2H12zm-6 14h28v4H6v-4z"/>
                            </svg>
                        </div>
                        <p class="label-text">Industry Partners</p>
                    </div>
                </label>

            </div>
                <button class="continue-btn">Continue</button>
    </div>
</div>

</body>
</html>
