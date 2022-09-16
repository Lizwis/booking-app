<template>
  <div class="row justify-content-center mx-0 pt-4 mt-0">
    <div class="col-lg-4 border shadow-sm py-4 px-2 mx-2">
      <div class="col-12 text-center py-4 bg-login">
        <h4 class="pt-4">Welcome back!</h4>
        <h5 class="font-weight-light">Sign in to your account.</h5>
      </div>

      <form @submit.prevent="submit()">
        <div class="col-md-12 font-weight-bold px-4">
          <h5 class="label">Email</h5>
          <input
            id="email"
            type="email"
            class="form-control mt-2"
            name="email"
            v-model="form.email"
            autocomplete="email"
            style="height: 45px"
            autofocus
          />
          <span class="text-danger font-weight-light" v-if="errors.email">{{
            errors.email[0]
          }}</span>
        </div>

        <div class="col-md-12 font-weight-bold pt-3 px-4">
          <h5 class="label">Password</h5>
          <input
            id="password"
            type="password"
            class="form-control mt-2"
            name="password"
            style="height: 45px"
            autocomplete="current-password"
            v-model="form.password"
          />
          <span class="text-danger font-weight-light" v-if="errors.password">{{
            errors.password[0]
          }}</span>
        </div>

        <div class="col-12 pt-4 px-4 pb-4">
          <router-link to="/register" class="text-left">
            Don't gave an account?
          </router-link>
        </div>
        <div class="col-12 px-4 pb-4">
          <el-button
            type="primary"
            style="font-weight: bold; font-size: 16px; height: 45px"
            class="submit-button btn-block"
            @click="submit"
          >
            Login</el-button
          >
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import User from "../api/User";

export default {
  data: function () {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
      header: true,
    };
  },

  methods: {
    submit() {
      User.login(this.form)
        .then((response) => {
          localStorage.setItem("token", response.data.access_token);
          this.$router.go({ path: "/bookings-list" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
<style scoped>
.label {
  font-size: 16px;
}
</style>
