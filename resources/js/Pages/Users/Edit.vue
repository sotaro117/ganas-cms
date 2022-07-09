<template>
    <Head title="ユーザー編集 | ganas" />
    <div class="max-w-6xl mx-auto">
        <div class="md:grid md:grid-cols-3 md:gap-6 mt-5">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-xl font-semibold leading-6 text-gray-900">
                        Profile
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This information will be displayed publicly so be
                        careful what you share.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form @submit.prevent="update">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="flex">
                                    <div>
                                        <label
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                            "
                                        >
                                            Photo
                                        </label>
                                        <div class="flex">
                                            <span
                                                v-if="!userProfile.avatar"
                                                class="
                                                    mt-2
                                                    inline-block
                                                    h-14
                                                    w-14
                                                    rounded-full
                                                    overflow-hidden
                                                    bg-gray-100
                                                "
                                            >
                                                <svg
                                                    class="
                                                        h-full
                                                        w-full
                                                        text-gray-300
                                                    "
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"
                                                    />
                                                </svg>
                                            </span>
                                            <span
                                                v-else
                                                class="
                                                    mt-2
                                                    inline-block
                                                    h-14
                                                    w-14
                                                    rounded-full
                                                    overflow-hidden
                                                    bg-gray-100
                                                "
                                            >
                                                <img
                                                    :src="
                                                        '../../../storage/avatars/' +
                                                        userProfile.avatar
                                                    "
                                                    :alt="
                                                        userProfile.last_name +
                                                        userProfile.first_name
                                                    "
                                                />
                                            </span>
                                            <input
                                                class="mt-8 ml-3"
                                                id="avatar"
                                                name="avatar"
                                                type="file"
                                                @input="
                                                    form.avatar =
                                                        $event.target.files[0]
                                                "
                                                required
                                            />
                                        </div>
                                        <div
                                            v-if="form.errors.avatar"
                                            v-text="form.errors.avatar"
                                            class="text-red-500 text-xs mt-1"
                                        ></div>
                                    </div>
                                </div>
                                <div
                                    class="mt-1 items-center ml-8 text-md pt-8"
                                ></div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="last_name"
                                    class="
                                        block
                                        text-sm
                                        font-medium
                                        text-gray-700
                                    "
                                    >Last name</label
                                >
                                <input
                                    type="text"
                                    name="last_name"
                                    id="last_name"
                                    v-model="form.last_name"
                                    class="
                                        mt-1
                                        focus:ring-green-500
                                        focus:border-green-500
                                        block
                                        w-full
                                        py-2
                                        px-2
                                        border
                                        shadow-sm
                                        sm:text-sm
                                        border-gray-300
                                        rounded-md
                                    "
                                    :placeholder="`${userProfile.last_name}`"
                                />
                                <div
                                    v-if="form.errors.last_name"
                                    v-text="form.errors.last_name"
                                    class="text-red-500 text-xs mt-1"
                                ></div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="first_name"
                                    class="
                                        block
                                        text-sm
                                        font-medium
                                        text-gray-700
                                    "
                                    >First name</label
                                >
                                <input
                                    type="text"
                                    name="first_name"
                                    id="first_name"
                                    v-model="form.first_name"
                                    class="
                                        mt-1
                                        focus:ring-green-500
                                        focus:border-green-500
                                        block
                                        py-2
                                        px-2
                                        w-full
                                        border
                                        shadow-sm
                                        sm:text-sm
                                        border-gray-300
                                        rounded-md
                                    "
                                    :placeholder="`${userProfile.first_name}`"
                                />
                                <div
                                    v-if="form.errors.first_name"
                                    v-text="form.errors.first_name"
                                    class="text-red-500 text-xs mt-1"
                                ></div>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label
                                    for="email-address"
                                    class="
                                        block
                                        text-sm
                                        font-medium
                                        text-gray-700
                                    "
                                    >Email address</label
                                >
                                <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    v-model="form.email"
                                    class="
                                        mt-1
                                        focus:ring-green-500
                                        focus:border-green-500
                                        block
                                        py-2
                                        px-2
                                        border
                                        w-full
                                        shadow-sm
                                        sm:text-sm
                                        border-gray-300
                                        rounded-md
                                    "
                                    :placeholder="`${userProfile.email}`"
                                />
                                <div
                                    v-if="form.errors.email"
                                    v-text="form.errors.email"
                                    class="text-red-500 text-xs mt-1"
                                ></div>
                            </div>
                            <div>
                                <label
                                    for="description"
                                    class="
                                        block
                                        text-sm
                                        font-medium
                                        text-gray-700
                                    "
                                >
                                    About
                                </label>
                                <div class="mt-1">
                                    <textarea
                                        id="description"
                                        name="description"
                                        rows="5"
                                        class="
                                            shadow-sm
                                            focus:ring-green-500
                                            focus:border-green-500
                                            mt-1
                                            px-2
                                            py-2
                                            block
                                            w-full
                                            sm:text-sm
                                            border border-gray-300
                                            rounded-md
                                        "
                                        placeholder="you@example.com"
                                        v-model="form.description"
                                        required
                                    />
                                    <div
                                        v-if="form.errors.description"
                                        v-text="form.errors.description"
                                        class="text-red-500 text-xs mt-1"
                                    ></div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for your profile. URLs are
                                    hyperlinked.
                                </p>
                            </div>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                type="submit"
                                class="
                                    inline-flex
                                    justify-center
                                    py-2
                                    px-4
                                    border border-transparent
                                    shadow-sm
                                    text-sm
                                    font-medium
                                    rounded-md
                                    text-white
                                    bg-green-500
                                    hover:bg-green-600
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-green-300
                                "
                                :disabled="form.processing"
                                @click="update"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: { userProfile: Object },
    data() {
        return {
            form: this.$inertia.form({
                last_name: "",
                first_name: "",
                email: "",
                avatar: null,
                description: "",
            }),
        };
    },
    methods: {
        update() {
            this.form.post(`/users/${this.userProfile.id}`);
        },
        destroy() {
            this.form.delete(`/users/${this.userProfile.id}`);
        },
    },
};
</script>
