<template>
    <sm-form
        :className="className"
        :url="url"
        :method="method"
    >
        <input type="hidden" name="_token" :value="csrf">
        <sm-field>
            <sm-input
                :type="'text'"
                :name="'first_name'"
                :placeholder="'First name'"
            ></sm-input>
        </sm-field>

        <sm-field>
            <sm-input
                :type="'text'"
                :name="'last_name'"
                :placeholder="'Last name'"
            ></sm-input>
        </sm-field>

        <sm-field>
            <sm-input
                :type="'email'"
                :name="'email'"
                :placeholder="'Email'"
            ></sm-input>
        </sm-field>

        <sm-field>
            <sm-input
                :type="'password'"
                :name="'password'"
                :placeholder="'Password'"
            ></sm-input>
        </sm-field>

        <sm-field>
            <sm-input
                :type="'password'"
                :name="'password_confirm'"
                :placeholder="'Password confirm'"
            ></sm-input>
        </sm-field>

        <div class="button_wrapper">
            <sm-button
                :buttonType="'submit'"
                :buttonClass="'danger'"
            >
                Submit
            </sm-button>
        </div>
    </sm-form>
</template>

<script>
import SmButton from "../ui_components/SmButton";
import SmForm from "../ui_components/SmForm";
export default {
    name: "SmRegister",
    components: {SmForm, SmButton},
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
