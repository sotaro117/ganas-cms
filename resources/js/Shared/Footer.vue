<template>
    <footer class="flex flex-col">
        <div class="flex justify-around">
            <img src="https://dummyimage.com/100x50" alt="" />
            <div class="flex space-x-2">
                <font-awesome-icon
                    icon="fa-brands fa-twitter-square "
                    class="
                        text-4xl text-white
                        transition
                        hover:delay-75
                        hover:text-blue-400
                    "
                />
                <font-awesome-icon
                    icon="fa-brands fa-facebook-square "
                    class="
                        text-4xl text-white
                        transition
                        hover:delay-75
                        hover:text-blue-600
                    "
                />
            </div>
        </div>
        <ul
            class="lg:flex justify-evenly mt-8 text-center space-y-2 text-white"
        >
            <li>
                <Link href="/about" class="hover:text-green-400"
                    >ganasとは</Link
                >
            </li>
            <li>
                <Link href="/supporter" class="hover:text-green-400"
                    >支援者募集</Link
                >
            </li>
            <li>
                <Link href="/ads" class="hover:text-green-400"
                    >情報提供と広告掲載</Link
                >
            </li>
            <li>
                <Link href="/contact" class="hover:text-green-400"
                    >お問い合わせ</Link
                >
            </li>
        </ul>
        <div class="text-center mt-8 text-white">
            <h6>CopyRight</h6>
        </div>
    </footer>
</template>

<script>
export default {};
</script>
