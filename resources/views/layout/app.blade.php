<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
    <script type="text/javascript">
        window.tailwind.config = {
            darkMode: ['class'],
            theme: {
                extend: {
                    colors: {
                        border: 'hsl(var(--border))',
                        input: 'hsl(var(--input))',
                        ring: 'hsl(var(--ring))',
                        background: 'hsl(var(--background))',
                        foreground: 'hsl(var(--foreground))',
                        primary: {
                            DEFAULT: 'hsl(var(--primary))',
                            foreground: 'hsl(var(--primary-foreground))'
                        },
                        secondary: {
                            DEFAULT: 'hsl(var(--secondary))',
                            foreground: 'hsl(var(--secondary-foreground))'
                        },
                        destructive: {
                            DEFAULT: 'hsl(var(--destructive))',
                            foreground: 'hsl(var(--destructive-foreground))'
                        },
                        muted: {
                            DEFAULT: 'hsl(var(--muted))',
                            foreground: 'hsl(var(--muted-foreground))'
                        },
                        accent: {
                            DEFAULT: 'hsl(var(--accent))',
                            foreground: 'hsl(var(--accent-foreground))'
                        },
                        popover: {
                            DEFAULT: 'hsl(var(--popover))',
                            foreground: 'hsl(var(--popover-foreground))'
                        },
                        card: {
                            DEFAULT: 'hsl(var(--card))',
                            foreground: 'hsl(var(--card-foreground))'
                        },
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            :root {
                --background: 240 10% 96%;
                --foreground: 210 10% 10%;
                --card: 255 255 255;
                --card-foreground: 210 10% 10%;
                --popover: 255 255 255;
                --popover-foreground: 210 10% 10%;
                --primary: 210 50% 60%;
                --primary-foreground: 255 255 255;
                --secondary: 210 10% 90%;
                --secondary-foreground: 210 10% 20%;
                --muted: 210 20% 95%;
                --muted-foreground: 210 10% 30%;
                --accent: 210 10% 90%;
                --accent-foreground: 210 10% 30%;
                --destructive: 0 80% 60%;
                --destructive-foreground: 255 255 255;
                --border: 210 10% 80%;
                --input: 210 10% 80%;
                --ring: 210 50% 70%;
            }
            .dark {
                --background: 210 10% 10%;
                --foreground: 210 90% 90%;
                --card: 210 10% 20%;
                --card-foreground: 210 90% 90%;
                --popover: 210 10% 20%;
                --popover-foreground: 210 90% 90%;
                --primary: 210 70% 50%;
                --primary-foreground: 210 10% 20%;
                --secondary: 210 20% 30%;
                --secondary-foreground: 210 90% 90%;
                --muted: 210 20% 30%;
                --muted-foreground: 210 80% 60%;
                --accent: 210 20% 30%;
                --accent-foreground: 210 90% 90%;
                --destructive: 0 60% 50%;
                --destructive-foreground: 210 90% 90%;
                --border: 210 20% 30%;
                --input: 210 20% 30%;
                --ring: 210 50% 60%;
            }
        }
        .menu-icon, .events-icon, .close-icon,.head-profile{
            display: none;
        }
        .dashboard-card {
    background: rgb(66, 67, 66);
    color: white;
    border: 1px solid var(--border);
    padding: 1.5rem;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}
    #profile .bg-card{
        background-color: rgb(238, 253, 238);
    }
    .bg-green{
        background-color: green;
    }
    @media (max-width: 992px) {
        .aside-right{
            display: none;
        }
        .aside-left{
            width: 10%;
        }
        button span{
            display: none;
        }
        .quick-links span{
            display: none;
        }
        .search-bar{
            display: none;
        }
        .aside-left .profile-head{
            display: flex;
        }
        .aside-left span{
            display: none;
        }
    }
    @media (max-width: 730px) {
            /* Header Section */
            #header {
                width: 100%;
                max-width: 600px; /* Maximum width for the header */
                margin-bottom: 1rem; /* Space between header and content */
            }

            .head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.5rem;
                background-color: #fff;
                border-radius: 0.5rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .menu-icon {
                font-size: 1.5rem;
                color: #333;
                cursor: pointer;
                display: block;
            }
            .aside-left{
                display: none;
            }
            .menu {
                display: none; /* Initially hidden */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                max-width: 300px; /* Maximum width for the menu */
                height: 100%;
                background-color: #ffffff;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
                padding: 1rem;
                z-index: 1000;
                overflow-y: auto;
                transition: transform 0.3s ease; /* Smooth transition */
                transform: translateX(-100%); /* Hide off-screen by default */
            }

            .menu.active {
                display: block; /* Show menu when active */
                transform: translateX(0); /* Slide menu in */
            }

            .menu .close-icon {
                position: absolute;
                top: 1rem;
                right: 1rem;
                font-size: 1.5rem;
                color: #333;
                cursor: pointer;
                display: block;
            }

            .menu input {
                border: 1px solid #ccc;
                border-radius: 0.25rem;
                padding: 0.5rem;
                margin-bottom: 1rem;
            }

            .menu nav ul {
                list-style: none;
                padding: 0;
            }

            .menu nav ul li {
                margin-bottom: 0.5rem;
            }

            .menu button {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                border-radius: 0.5rem;
                background-color: #007BFF; /* Primary color */
                color: #fff;
                text-align: left;
                width: 100%;
                border: none;
                cursor: pointer;
            }

            .menu button:hover {
                background-color: #0056b3; /* Darker shade for hover */
            }

            .menu i {
                margin-right: 0.5rem;
            }

            .head {
                flex-direction: row; /* Arrange items in a row */
            }
            .aside-left {
        display: none; /* Hide sidebar by default */
    }

    .aside-left.active {
        display: block; /* Show sidebar when active */
        position: fixed; /* Fix sidebar on the screen */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        overflow-y: auto;
        padding: 1rem;
        transition: transform 0.3s ease; /* Smooth transition */
        transform: translateX(-100%); /* Hide off-screen by default */
    }

    .aside-left.active {
        transform: translateX(0); /* Slide sidebar in */
    }
    .events-icon{
        display: block;
    }
        }

    </style>
</head>
<section id="header">
    <div class="head">
        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="head-profile">
            <h4>Profile</h4>
        </div>
        <div class="events-icon">
            <i class="fa-solid fa-calendar"></i>
        </div>
    </div>
    <div class="menu">
        <div class="close-icon">
            <i class="fas fa-times"></i>
        </div>
</section>
<body class="min-h-screen bg-background text-foreground">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="aside-left  w-64 bg-green shadow-lg p-6 border-r border-border">
            <div class=" profile-head flex items-center space-x-4 mb-8" >
                <img src="/images/img-DOagCjd9WK6ZtiEjGEVyZ.jpg" alt="User Avatar" class="rounded-full" style="width: 50px;"/>
                <span class="text-lg font-semibold">Hello, Admin</span>
            </div>
            <!-- Navigation Links -->
<!-- Navigation Links -->
<section id="navigation">
    <nav>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard-1') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.profile') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.trip.index') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-solid fa-location-pin"></i>
                    <span>Trips</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bookings') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-regular fa-folder-open"></i>
                    <span>Bookings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.earnings') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-solid fa-wallet"></i>
                    <span>Earnings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.vehicles.index') }}" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                    <i class="fa-solid fa-bus"></i>
                    <span>Vehicles</span>
                </a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                        <i class="fa-solid fa-power-off"></i>
                        <span>Log Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</section>
            <!-- Quick Links -->
            <div class=" quick-links mt-6 border-t border-border pt-4 bg-green">
                <h3 class="text-lg font-semibold mb-2 text-primary">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="block py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Help Center</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-solid fa-phone"></i>
                            <span>Support</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 rounded hover:bg-muted space-x-2">
                            <i class="fa-solid fa-question"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
<body>
<main class="flex-1 p-8 bg-secondary rounded-lg">
<div id="dashboard" class="content section hidden">
@yield('trip')
@yield('dashboard')
@yield('profile')
@yield('bookings')
@yield('earnings')
@yield('vehicles')
    </main>
<script>
         document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.querySelector('.menu-icon');
        const closeIcon = document.querySelector('.close-icon');
        const menu = document.querySelector('.menu');

        menuIcon.addEventListener('click', () => {
            menu.classList.toggle('active'); // Toggle the 'active' class to show/hide the menu
        });

        closeIcon.addEventListener('click', () => {
            menu.classList.remove('active'); // Remove the 'active' class to hide the menu
        });
    });
    window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        menu.classList.remove('active'); // Ensure menu is hidden on larger screens
    }
});

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('main > div').forEach(div => {
                div.classList.add('hidden');
            });
            // Show the clicked section
            document.getElementById(sectionId).classList.remove('hidden');

            // Update active button state
            document.querySelectorAll('aside nav ul li button').forEach(button => {
                button.classList.remove('bg-primary', 'text-primary-foreground', 'hover:bg-primary-dark');
                button.classList.add('hover:bg-muted');
            });
            document.querySelector(`aside nav ul li button[onclick="showSection('${sectionId}')"]`).classList.add('bg-primary', 'text-primary-foreground', 'hover:bg-primary-dark');
        }
        

        // Show the dashboard section by default
        showSection('dashboard');
        
    </script>
</body>
</html>
