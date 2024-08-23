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
                <img src="https://i.pinimg.com/564x/ed/fa/99/edfa99acd83205af626ad04d9e2f00fd.jpg" alt="User Avatar" class="rounded-full" style="width: 50px;"/>
                <span class="text-lg font-semibold">Hello, Admin</span>
            </div>
            <!-- Navigation Links -->
             <section id="navigation">
            <nav>
                <ul class="space-y-2">
                    <li>
                        <button id="dashboard-btn" onclick="showSection('dashboard')" class="flex items-center space-x-2 py-2 px-4 rounded bg-primary text-primary-foreground hover:bg-primary-dark">
                            <i class="fa-solid fa-chart-line"></i>
                            <span>Dashboard</span>
                        </button>
                    </li>
                    <li>
                        <button id="profile-btn" onclick="showSection('profile')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-regular fa-user"></i>
                            <span>Profile</span>
                        </button>
                    </li>
                    <li>
                        <button  id="services-btn" onclick="showSection('services')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-solid fa-location-pin"></i>
                            <span>Trips</span>
                        </button>
                    </li>
                    <li>
                        <button id="bookings-btn" onclick="showSection('bookings')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-regular fa-folder-open"></i>
                            <span>Bookings </span>
                        </button>
                    </li>
                    <li>
                        <button id="earning-btn" onclick="showSection('earnings')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-solid fa-wallet"></i>
                            <span>Earning</span>
                        </button>
                    </li>bv
                    <li>
                        <button id="calendar-btn" onclick="showSection('calendar')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                        <i class="fa-solid fa-bus"></i>
                        <span>Vehicles</span>
                        </button>
                    </li>
                    <li>
                        <button id="logout-btn" onclick="showSection('logout')" class="flex items-center space-x-2 py-2 px-4 rounded hover:bg-muted">
                            <i class="fa-solid fa-power-off"></i>
                            <span>Log Out</span>
                        </button>
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
                <!-- Main Content -->
        <main class="flex-1 p-8 bg-secondary rounded-lg">
            <div id="dashboard" class="content section hidden">
          <h1 class="text-3xl font-semibold mb-4 text-primary">Dashboard</h1>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <div class="dashboard-card">
                  <h3 class="text-lg font-semibold text-primary">Total Bookings</h3>
                  <p class="text-2xl font-bold">56</p>
              </div>
              <div class="dashboard-card">
                  <h3 class="text-lg font-semibold text-primary">Trips</h3>
                  <p class="text-2xl font-bold">4</p>
              </div>
              <div class="dashboard-card">
                  <h3 class="text-lg font-semibold text-primary">Earnings</h3>
                  <p class="text-2xl font-bold">Ksh 50000</p>
              </div>
              <div class="dashboard-card">
                <h3 class="text-lg font-semibold text-primary">Our vehicles</h3>
                <p class="text-2xl font-bold">5</p>
            </div>
            <div class="dashboard-card">
              <h3 class="text-lg font-semibold text-primary">Upcoming Reservations</h3>
              <p class="text-2xl font-bold">5</p>
              <p class="text-sm text-muted-foreground">Reservations for the next week.</p>
          </div>
          <div class="dashboard-card">
            <h3 class="text-lg font-semibold text-primary">Upcoming Reservations</h3>
            <p class="text-2xl font-bold">5</p>
            <p class="text-sm text-muted-foreground">Reservations for the next week.</p>
        </div>
        <div class="dashboard-card">
          <h3 class="text-lg font-semibold text-primary">Upcoming Reservations</h3>
          <p class="text-2xl font-bold">5</p>
          <p class="text-sm text-muted-foreground">Reservations for the next week.</p>
      </div>
          </div>
      </div>
      <div id="profile" class="content hidden">
        <h1 class="text-3xl font-semibold mb-4 text-primary">My Profile</h1>
        <div class="bg-card p-6 rounded-lg shadow-md border border-border">
            <h2 class="text-xl font-semibold mb-4 text-primary">Your Details</h2>
            <div class="mb-6">
                <label class="block text-sm font-medium text-muted-foreground">Photo</label>
                <div class="flex items-center mt-2">
                    <img class="w-24 h-24 rounded-full" src="/images/img-DOagCjd9WK6ZtiEjGEVyZ.jpg" alt="Profile Picture">
                    <div class="ml-4">
                        <input type="file" id="profile-picture" accept="image/*" class="hidden">
                        <label for="profile-picture" class="cursor-pointer inline-block bg-primary text-white px-4 py-2 rounded">Browse</label>
                        <button type="button" class="ml-2 bg-gray-200 text-gray-800 px-4 py-2 rounded">Delete</button>
                    </div>
                </div>
            </div>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="first-name" class="block text-sm font-medium text-muted-foreground">First Name</label>
                    <input type="text" id="first-name" class="mt-1 block w-full border border-input rounded p-2" value="muturi" />
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-medium text-muted-foreground">Last Name</label>
                    <input type="text" id="last-name" class="mt-1 block w-full border border-input rounded p-2" value="Alex"/>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-muted-foreground">Phone</label>
                    <input type="text" id="phone" class="mt-1 block w-full border border-input rounded p-2" value="0798630435" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-muted-foreground">Email</label>
                    <input type="email" id="email" class="mt-1 block w-full border border-input rounded p-2" value="temp.account@test.com" />
                </div>
                <div>
                    <label for="website" class="block text-sm font-medium text-muted-foreground">Location</label>
                    <input type="text" id="website" class="mt-1 block w-full border border-input rounded p-2" value="Nairobi" />
                </div>
                <div>
                    <label for="about-me" class="block text-sm font-medium text-muted-foreground">About Me</label>
                    <textarea id="about-me" class="mt-1 block w-full border border-input rounded p-2"></textarea>
                </div>
                <div>
                    <label for="id-number" class="block text-sm font-medium text-muted-foreground">ID number</label>
                    <input type="text" id="id-number" class="mt-1 block w-full border border-input rounded p-2" value="8630435" />
                </div>
                <div>
                    <label for="facebook" class="block text-sm font-medium text-muted-foreground">Facebook Url</label>
                    <input type="text" id="facebook" class="mt-1 block w-full border border-input rounded p-2" />
                </div>
                <div>
                    <label for="twitter" class="block text-sm font-medium text-muted-foreground">Twitter Url</label>
                    <input type="text" id="twitter" class="mt-1 block w-full border border-input rounded p-2" />
                </div>
                <div class="col-span-2">
                    <button type="submit" class="mt-2 bg-primary text-white p-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div><div id="services" class="content p-6 bg-gray-100">
    <h1 class="text-3xl font-semibold mb-4 text-primary">Trips</h1>
    <p class="mb-6">Here you can Add, update or remove a trip</p>

    <div class="overflow-x-auto">
        <table class="min-w-full max-w-5xl mx-auto bg-white border rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-4 text-left">Route</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Pricing</th>
                    <th class="py-3 px-4 text-left">Capacity</th>
                    <th class="py-3 px-4 text-left">Vehicles</th>
                    <th class="py-3 px-4 text-left">Pick up stations</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Background Photo</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($trips as $trip)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4 text-left">{{ $trip->route }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->date->format('d M Y') }}</td>
                        <td class="py-3 px-4 text-left">KSH {{ number_format($trip->pricing, 2) }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->capacity }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->vehicles }}</td>
                        <td class="py-3 px-4 text-left">{{ $trip->pick_up_stations }}</td>
                        <td class="py-3 px-4 text-left w-45">{{ $trip->description }}</td>
                        <td class="py-3 px-4 text-left">
                            <img src="{{ asset('storage/' . $trip->background_photo) }}" alt="Trip Photo" class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('trips.edit', $trip->id) }}" class="text-blue-500 hover:text-blue-700 transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </a>
                                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trip?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('trips.create') }}" class="mt-4 inline-block bg-primary text-white py-2 px-4 rounded">Add New Trip</a>
</div>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Add New Service</button>
    </div>
    
    <div id="bookings" class="content hidden p-6 bg-gray-50 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold mb-4 text-primary">My Bookings</h1>
        <p class="mb-6 text-gray-600">View and manage your booked services.</p>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-primary text-white border-b border-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">Service Name</th>
                        <th class="px-4 py-3 text-left">Customer Name</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Location</th>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Time</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Example Booking Entry -->
                    <tr>
                        <td class="px-4 py-3 text-gray-700">Service Name 1</td>
                        <td class="px-4 py-3 text-gray-700">Customer Name 1</td>
                        <td class="px-4 py-3 text-gray-700">+254 700 000000</td>
                        <td class="px-4 py-3 text-gray-700">Nairobi, Kenya</td>
                        <td class="px-4 py-3 text-gray-700">2024-07-14</td>
                        <td class="px-4 py-3 text-gray-700">10:00 AM</td>
                        <td class="px-4 py-3 text-green-500 font-medium">Confirmed</td>
                        <td class="px-4 py-3 text-gray-700">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">Contact Customer</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 text-gray-700">Service Name 2</td>
                        <td class="px-4 py-3 text-gray-700">Customer Name 2</td>
                        <td class="px-4 py-3 text-gray-700">+254 700 111111</td>
                        <td class="px-4 py-3 text-gray-700">Mombasa, Kenya</td>
                        <td class="px-4 py-3 text-gray-700">2024-07-15</td>
                        <td class="px-4 py-3 text-gray-700">2:00 PM</td>
                        <td class="px-4 py-3 text-yellow-500 font-medium">Pending</td>
                        <td class="px-4 py-3 text-gray-700">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">Contact Customer</button>
                        </td>
                    </tr>
                    <!-- Add more bookings here -->
                </tbody>
            </table>
        </div>
    </div>
    <div id="earnings" class="content hidden">
        <h1 class="text-3xl font-semibold mb-6 text-primary">Earnings</h1>
        <p class="mb-4 text-gray-600">View your earnings per month and the total earnings at the bottom.</p>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-gray-100 border-b border-gray-400">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-700 font-semibold">Month</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-semibold">Earnings</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Example Earnings Entry -->
                    <tr>
                        <td class="px-6 py-4 text-gray-700">January 2024</td>
                        <td class="px-6 py-4 text-gray-700">$500.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-gray-700">February 2024</td>
                        <td class="px-6 py-4 text-gray-700">$600.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-gray-700">March 2024</td>
                        <td class="px-6 py-4 text-gray-700">$450.00</td>
                    </tr>
                    <!-- Add more earnings data here -->
                </tbody>
                <tfoot class="bg-gray-100 border-t border-gray-400">
                    <tr>
                        <td class="px-6 py-3 text-left text-gray-700 font-semibold">Total Earnings</td>
                        <td class="px-6 py-3 text-gray-700 font-semibold">$1550.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
            <div id="calendar" class="content hidden p-6 bg-gray-50 rounded-lg shadow-lg">
                <h1 class="text-3xl font-semibold mb-4 text-primary">Calendar</h1>
                <p class="mb-6 text-gray-600">View your bookings and manage your schedule.</p>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <div id="calendar"></div>
                </div>
            </div>
            
            <div id="logout" class="content hidden">
                <h1 class="text-3xl font-semibold mb-4 text-primary">Log Out</h1>
                <p>Are you sure you want to log out?</p>
            </div>
        </main>
        
    </div>
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
