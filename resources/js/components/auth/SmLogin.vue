<template>
    <sm-form
        :className="className"
        :url="url"
        :method="method"
    >
        <input type="hidden" name="_token" :value="csrf">
        <sm-field>
            <sm-input
                :tyep="'email'"
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
        <div class="button_wrapper">
            <sm-button
                :buttonType="'submit'"
                :buttonClass="'danger'"
            >
                Log in
            </sm-button>
        </div>
    </sm-form>
</template>

<script>
export default {
    name: "SmLogin",
    data: () => ({
        className: "login",
        url: "http://sm.test/login",
        method: "post",
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    })
}
</script>

<style scoped>

</style>
