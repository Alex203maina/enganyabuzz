@extends('layout.app')

@section('profile')
<div id="profile">
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
    </div>
    @endsection