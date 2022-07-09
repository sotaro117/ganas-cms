<template>
    <img
        src="https://dummyimage.com/50x50"
        alt=""
        class="mx-auto -mb-6"
        style="width: 145px"
    />
    <h5 class="text-3xl">サポーター登録へ</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="inline-block mx-auto rounded-full">
            <button
                type="submit"
                class="
                    transition-colors
                    duration-300
                    bg-green-500
                    hover:bg-green-600
                    mt-4
                    lg:mt-0
                    lg:ml-3
                    rounded-full
                    text-xs
                    font-semibold
                    text-white
                    uppercase
                    py-3
                    px-8
                "
            >
                <Link href="/signin">サポーター登録</Link>
            </button>
        </div>
    </div>
</template>

<script>
export default {};
</script>
