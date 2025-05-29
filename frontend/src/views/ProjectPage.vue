<script setup>
    import ButtonExt from '@/components/ButtonExt.vue'
</script>

<template>
    <section class="laptop:px-[8%]  tablet:px-[10%] px-[6%] py-20 flex flex-col gap-12">
        <div class="flex flex-col    gap-8">

            <div class="flex w-full flex-col md:flex-row bg-grey overflow-hidden rounded-lg">
                <div class="md:w-1/2 lg:h-[500px] h-[400px]">
                    <img src="@/assets/fracturedjinx.jpg" class=" w-full h-full object-cover" alt="">
                </div>

                <div class="flex flex-col md:w-1/2 lg:h-[500px] h-[400px]">
                    <div class="w-full h-1/2">
                        <img src="@/assets/fracturedjinx.jpg" class=" w-full h-full object-cover" alt="">
                    </div>
                    <div class="w-full md:h-1/2">
                        <img src="@/assets/fracturedjinx.jpg" class=" w-full h-full object-cover" alt="">
                    </div>


                </div>

            </div>

            <h1 class="text-4xl capitalize w-[80%] font-semibold">The Truth Behind JavaScript And Daffodils Over the Hill
            </h1>



        </div>

        <div class="flex flex-col gap-4">
            <h2 class="text-3xl font-semibold my-2">About Project</h2>
            <p class="text-grey-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias laborum voluptate eum
                obcaecati sunt
                atque!
                Voluptatum cum dolores, maxime perferendis, mollitia aperiam debitis distinctio voluptates quisquam eos
                voluptatibus reprehenderit quaerat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure,
                distinctio. Eligendi molestiae repellendus, harum exercitationem odio eaque accusamus nostrum, commodi
                perferendis vel fugit consequuntur voluptates incidunt blanditiis est dolorem aliquid. Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Vitae corporis incidunt qui exercitationem nisi cumque illum unde,
                voluptate nihil consectetur, ratione suscipit rerum facere nam esse provident. Adipisci, magni cupiditate.
            </p>
            <p class="text-grey-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum incidunt
                excepturi tempora
                nesciunt omnis
                ex, veritatis eos adipisci eius assumenda ipsam recusandae non nemo in sunt voluptate aspernatur magni
                voluptas.
                Dolor, animi qui? Ab optio quasi explicabo est illo tenetur molestiae fugiat laborum, dolorum nihil veniam
                facere quos tempore reprehenderit facilis. Deleniti dolore molestias architecto, obcaecati accusamus
                recusandae tempore voluptatum!</p>
        </div>


        <div class="flex flex-col gap-4">
            <h2 class="text-3xl font-semibold my-2">Project Links</h2>
            <div class=" flex gap-2">

                <ButtonExt content="Demo" link="#" />
                <ButtonExt content="Source Code" link="#" />
               
            </div>
        </div>


        <div class="flex flex-col gap-4">
            <h2 class="text-3xl font-semibold my-2">Tech Stack Used</h2>
            <div class="flex gap-3 flex-wrap">
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/vue.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        Vue.js
                    </span>

                </span>

                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/express2.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        Express.js
                    </span>

                </span>
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/tailwind.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        Tailwind
                    </span>

                </span>

                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/js.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        JavaScript
                    </span>

                </span>
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-16" src="@/assets/cplusplus.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        C++
                    </span>

                </span>

                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/laravel.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        Laravel
                    </span>

                </span>
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/mysql.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        MySQL
                    </span>

                </span>
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/postgre.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        PostgreSQL
                    </span>

                </span>
                <span
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" src="@/assets/nodejs.svg" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        Node.js
                    </span>

                </span>


            </div>
        </div>
    </section>
</template>
<style>
   
</style>