<!-- component -->

<div class="relative min-h-screen  grid bg-black ">
    <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 ">
        <div class="relative sm:w-1/2 xl:w-3/5 bg-blue-500 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden  text-white bg-no-repeat bg-cover relative" style="background-image: url(https://i.postimg.cc/mrgPMqpP/logo.png);">
            <div class="absolute bg-black  opacity-25 inset-0 z-0"></div>
            <div class="w-full  lg:max-w-2xl md:max-w-md z-10 items-center text-center ">
                <div class=" font-bold leading-tight mb-6 mx-auto w-full content-center items-center ">

                </div>
            </div>
        </div>

        <div class="flex items-center justify-center md:justify-left w-full sm:w-auto h-full xl:w-1/2 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none">
            <div class="max-w-xl w-full space-y-12">
                <div class="lg:text-left text-center">
                    <div class=" flex items-center justify-center ">
                        <div class="bg-black flex flex-col w-80 border border-gray-900 rounded-lg px-8 py-10 hover:border-orange-600">

                            <form action="" method="post" class="flex flex-col space-y-8">
                                <div class="flex flex-col space-y-4 text-left">
                                    <label class="font-medium  text-white ">Username</label>
                                    <input type="text" name="username" formControlName="username" placeholder="Username" class="border rounded py-3 px-3 mt-2 bg-black border-gray-600 placeholder-white-500 text-white  hover:border-orange-600">
                                    <label class="font-medium  text-white">Email</label>
                                    <input type="email" name="email" formControlName="email" placeholder="email@example.com" class="border rounded py-3 px-3 bg-black border-gray-600 placeholder-white-500 text-white  hover:border-orange-600">
                                    <label class="font-medium  text-white">Password</label>
                                    <input type="password" formControlName="password" name="password" placeholder="*****" class="border rounded py-3 px-3 mt-2 bg-black border-gray-600 placeholder-white-500 text-white  hover:border-orange-600">

                                </div>
                                <button type="submit" class="border border-orange-600 bg-black text-white rounded py-3 font-semibold hover:border-gray-900 hover:bg-orange-600">Create Account</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>