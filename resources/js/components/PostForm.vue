<template>
    <div>
        <response-view
            :response="responseText"
            :class="'response ' + responseClass"
        ></response-view>
        <form v-if="post" @submit.prevent="submitForm">
            <div class="form-group">
                <label for="title">Title</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    class=""
                    v-model="post.title"
                    placeholder="Post title"
                />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    type="text"
                    class=""
                    rows="3"
                    v-model="post.description"
                    placeholder="What's this post about?"
                />
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea
                    id="body"
                    name="body"
                    type="text"
                    class=""
                    rows="8"
                    v-model="post.body"
                    placeholder="Write your post"
                />
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input
                    type="file"
                    accept="image/*"
                    @change="uploadImage"
                    id="image"
                    name="image"
                />
                <div id="image-preview">
                    <img v-if="imageUrl" :src="imageUrl" />
                </div>
            </div>
            <div class="form-group">
                <label for="tags">Categories</label>
                <multiselect
                    v-model="post.tags"
                    :options="tags"
                    label="name"
                    track-by="id"
                    :multiple="true"
                    :searchable="true"
                    :close-on-select="false"
                    tag-placeholder="Add new category"
                    placeholder="Select categories"
                >
                </multiselect>
            </div>
            <div>
                <button type="submit" class="button ml-5">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import ResponseView from "./ResponseView.vue";

export default {
    components: { Multiselect, ResponseView },
    data() {
        return {
            tags: [],
            post: null,
            responseText: {},
            responseClass: "hidden",
            edit: false,
            image: null,
            imageUrl: null,
        };
    },
    mounted() {
        this.preparePost();
    },

    methods: {
        submitForm() {
            let formData = this.prepareFormData();
            // CR :: var self = this, is niet nodig
            var self = this;
            if (self.edit) {
                var post = { id: self.$route.params.id, post: formData };
                this.$store
                    .dispatch("editPost", post)
                    .then(function (response) {
                        self.notifyUser("success", {
                            body: ["Your post has been updated"],
                        });
                    })
                    .catch(function (response) {
                        self.notifyUser("error", response.response.data.errors);
                    });
            } else {
                this.$store
                    .dispatch("storePost", formData)
                    .then(function (response) {
                        self.notifyUser("success", {
                            body: ["Your post has been published"],
                        });
                    })
                    .catch(function (response) {
                        self.notifyUser("error", response.response.data.errors);
                    });
            }
        },
        prepareFormData() {
            let formData = new FormData();
            //let submittedPost = JSON.parse(JSON.stringify(this.post));
            let tags = this.post.tags.map(function (value) {
                return value.id;
            });
            if (this.image) {
                formData.append("image", this.image, this.image.name);
            }
            formData.append("title", this.post.title);
            formData.append("description", this.post.description);
            formData.append("body", this.post.body);
            formData.append("tags[]", JSON.stringify(tags));
            return formData;
        },
        notifyUser(className, responseText) {
            this.responseClass = className;
            this.responseText = responseText;
        },
        preparePost() {
            this.$store
                .dispatch("getTags")
                .then((response) => (this.tags = response));
            if (this.$route.params.id) {
                this.$store
                    .dispatch("getPost", this.$route.params.id)
                    .then((response) => {
                        this.post = response.data;
                        this.imageUrl = response.data.image;
                    });
                this.edit = true;
            } else {
                this.post = {
                    title: "",
                    description: "",
                    body: "",
                    tags: [],
                };
                this.edit = false;
            }
        },
        uploadImage(e) {
            const file = e.target.files[0];
            this.image = file;
            this.imageUrl = URL.createObjectURL(file);
        },
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
/* CR :: mooi dat je de CSS scoped houd! */
label {
    display: block;
    padding: 0.3rem;
    letter-spacing: 0.05em;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
}
input {
    border-radius: 0.25rem;
    border: 1px solid #e8e8e8;
    background-color: #f3f7f9f1;
    width: 90%;
    padding: 0.8rem;
    font-size: 1rem;
    font-family: inherit;
}
textarea {
    border-radius: 0.25rem;
    border: 1px solid #e8e8e8;
    background-color: #f3f7f9f1;
    width: 90%;
    padding: 0.8rem;
    font-size: 1rem;
    font-family: inherit;
}
.form-group {
    padding: 1rem;
}
.multiselect {
    width: 92%;
}
.multiselect__tags {
    background-color: #f3f7f9f1;
}
.multiselect__tag {
    background: teal;
}
.button {
    background: teal;
    color: white;
    padding: 0.8rem;
    border: 1px solid teal;
    border-radius: 5px;
    margin: 2px;
}
</style>
