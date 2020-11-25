<template>
    <v-form
        :className="className"
        :url="url"
        :method="method"
    >
        <input type="hidden" name="_token" :value="csrf">
        <b-field>
            <b-input placeholder="First name"
                     type="text">
            </b-input>
        </b-field>
        <b-field>
            <b-input placeholder="Last name"
                     type="text">
            </b-input>
        </b-field>
        <b-field>
            <b-input placeholder="Email"
                     type="email"
                     name="email"
                     icon-pack="fas"
                     icon="envelope">
            </b-input>
        </b-field>
        <b-field>
            <b-input type="password"
                     name="password"
                     placeholder="password">
            </b-input>
        </b-field>
        <div class="button_wrapper">
            <v-button
                :buttonType="'submit'"
                :buttonClass="'danger'"
            >
                Submit
            </v-button>
        </div>
    </v-form>
</template>

<script>
export default {
    name: "VRegister",
    data: () => ({
        className: "register",
        url: "http://sm.test/register",
        method: "post",
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    })
}
</script>

<style scoped>

</style>
