<template v-slot:body>
    <editor
        :api-key="$inertia.page.props.TinyMce"
        :init="{
            height: 500,
            menubar: true,
            setup: function (editor) {
                editor.on('init change', function () {});
            },

            plugins: [
                'advlist autolink lists link  charmap print preview anchor autosave save',
                'searchreplace visualblocks code fullscreen visualblocks image code',
                'insertdatetime media table paste code help wordcount',
            ],
            toolbar:
                'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | restoredraft \
            | image code | visualblocks | save autosave | \
           bullist numlist outdent indent | removeformat | help',
            file_picker_types: 'image',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/posts/upload',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + new Date().getTime();
                        var blobCache =
                            tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            },
        }"
        v-model="body"
        v-on:onChange="this.update"
    />
</template>

<script>
import Editor from "@tinymce/tinymce-vue";

export default {
    name: "tiny-editor",
    props: { initialBody: String },

    data() {
        return {
            body: this.value, // default to the passed value
        };
    },
    components: {
        editor: Editor,
    },
    methods: {
        update() {
            // pass updated content back to the parent
            this.$emit("input", this.body);
        },
    },
};
</script>
