<!-- component -->

<div class="relative min-h-screen  grid bg-black ">
    <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 ">
        <div class="bg-black sm:w-1/2 xl:w-1/2 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden  text-white bg-no-repeat bg-cover relative">
            <div class="w-full lg:max-w-2xl md:max-w-md z-10 items-center text-center ">
                <div class="py-2 w-32 lg:w-60 mx-auto lg:py-4  rounded-bl-3xl rounded-tr-3xl bg-black ring ring-gray-900 hover:ring-orange-600  font-bold leading-tight mb-6  content-center items-center ">
                    <h1 class="text-2xl lg:text-3xl rounded-bl-3xl rounded-tr-3xl text-orange-600">YC Framework</h1>
                </div>
                <div class=" font-bold leading-tight mb-6 mx-auto w-full content-center items-center ">
                    <h1 class="text-3xl lg:text-5xl ">PHP in another <span class="text-orange-600 ">vision </span></h1>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center  md:justify-left w-full sm:w-auto h-full xl:w-1/2 p-8   sm:rounded-lg md:rounded-none">
            <div class="max-w-xl w-full space-y-10">

                <div class="lg:text-left text-center">
                    <div class=" flex items-center justify-center ">
                        <div class="lg:text-left text-center">
                            <div class=" flex flex-col  gap-6 items-center justify-center ">
                                <div class="md:hidden py-2 w-48 lg:w-60 mx-auto lg:py-4  rounded-bl-3xl rounded-tr-3xl bg-black ring ring-gray-900 hover:ring-orange-600  font-bold leading-tight mb-6  content-center items-center ">
                                    <h1 class="text-2xl lg:text-3xl rounded-bl-3xl rounded-tr-3xl text-orange-600">YC Framework</h1>
                                </div>
                                <div class="bg-black flex flex-col gap-4  w-80 border border-gray-900 rounded-lg p-6 hover:border-orange-600">

                                    <form action="" method="post" class="flex flex-col space-y-4">

                                        <div class="flex flex-col space-y-2 text-left">
                                            <div class="flex flex-col gap-2">
                                                <label class="font-medium  text-white text-[14px] xxl:text-lg">Username</label>
                                                <input type="text" name="username" placeholder="Username" value="<?php echo $auth->username ?? "" ?>" class="border rounded p-2  bg-black <?php echo isset($auth) && $auth->hasError('username') ?  "border-red-600 hover:border-red-600" : "border-gray-600 hover:border-orange-600" ?>  placeholder-white-500 text-white ">
                                                <small class="text-red-600"> <?php echo isset($auth) ?  $auth->getFirstError('username') : "" ?> </small>
                                            </div>

                                            <div class="flex flex-col gap-2">
                                                <label class="font-medium  text-white text-[14px] xxl:text-lg">Email</label>
                                                <input type="text" name="email" placeholder="email@example.com" value="<?php echo $auth->email ?? "" ?>" class="border rounded p-2 bg-black <?php echo isset($auth) &&  $auth->hasError('email') ?  "border-red-600 hover:border-red-600" : "border-gray-600 hover:border-orange-600" ?>  placeholder-white-500 text-white  ">
                                                <small class="text-red-600"> <?php echo isset($auth) ? $auth->getFirstError('email') : "" ?> </small>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label class="font-medium  text-white text-[14px] xxl:text-lg">Password</label>
                                                <input type="password" name="password" placeholder="*****" value="<?php echo $auth->password ?? "" ?>" class="border rounded p-2  bg-black <?php echo isset($auth) &&  $auth->hasError('password') ?  "border-red-600 hover:border-red-600" : "border-gray-600 hover:border-orange-600" ?>  placeholder-white-500 text-white ">
                                                <small class="text-red-600"> <?php echo isset($auth) ? $auth->getFirstError('password') : "" ?> </small>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <label class="font-medium text-white text-[14px] xxl:text-lg">Confirm Password</label>
                                                <input type="password" name="confirm_password" placeholder="*****" class="border rounded p-2  bg-black <?php echo isset($auth) &&  $auth->hasError('password') ? "border-red-600 hover:border-red-600" : "border-gray-600 hover:border-orange-600" ?> placeholder-white-500 text-white ">
                                                <small class="text-red-600"> <?php echo isset($auth) ? $auth->getFirstError('confirm_password') : "" ?> </small>
                                            </div>
                                        </div>

                                        <button type="submit" class="border border-orange-600 bg-black text-white rounded py-3 font-semibold hover:border-gray-900 hover:bg-orange-600">Create Account</button>
                                    </form>
                                    <div class="text-white text-center">
                                        <h1 class="text-sm">Already have an account ? <a href="/login" class="text-orange-600 font-medium">Sign in</a></h1>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>