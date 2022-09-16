<template>
  <div class="row justify-content-center mx-0">
    <div class="col-lg-5 border shadow py-4 px-5 mx-4">
      <div class="col-12 text-center py-4">
        <router-link to="/">Home </router-link>
        <h4 class="pt-4">Welcome back!</h4>
        <h5 class="font-weight-light" style="font-size: 15px">
          Create your account.
        </h5>
      </div>
      <form @submit.prevent="submit()">
        <div
          class="col-md-12 font-weight-bold px-4 pt-3"
          style="font-size: 14px"
        >
          <h5 class="label">Name</h5>
          <input
            id="name"
            type="text"
            class="form-control mt-2"
            v-model="form.name"
            autocomplete="name"
            style="height: 45px"
            autofocus
          />
          <span class="text-danger font-weight-light" v-if="errors.name">{{
            errors.name[0]
          }}</span>
        </div>

        <div
          class="col-md-12 font-weight-bold px-4 pt-3"
          style="font-size: 14px"
        >
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

        <div
          class="col-md-12 font-weight-bold pt-3 px-4"
          style="font-size: 14px"
        >
          <h5 class="label">Password</h5>
          <input
            id="password"
            type="password"
            class="form-control mt-2"
            name="password"
            style="height: 45px"
            v-model="form.password"
          />
          <span class="text-danger font-weight-light" v-if="errors.password">{{
            errors.password[0]
          }}</span>
        </div>

        <div
          class="col-md-12 font-weight-bold pt-3 px-4"
          style="font-size: 14px"
        >
          <h5 class="label">Confirm Password</h5>
          <input
            id="password_confirmation"
            type="password_confirmation"
            class="form-control mt-2"
            name="password_confirmation"
            style="height: 45px"
            v-model="form.password_confirmation"
          />
          <span
            class="text-danger font-weight-light"
            v-if="errors.password_confirmation"
            >{{ errors.password_confirmation[0] }}</span
          >
        </div>
        <div class="col-12 pt-4 px-4 pb-4">
          <div class="col-lg-6 px-0 float-left">
            <el-button
              type="primary"
              style="font-size: 16px; height: 45px"
              class="submit-button btn-block"
              @click="submit"
            >
              Register</el-button
            >
          </div>
          <router-link to="/login" class="text-right float-right pt-2">
            Have an account?
          </router-link>
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
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: [],
    };
  },

  methods: {
    submit() {
      User.register(this.form)
        .then(() => {
          this.$router.push({ path: "/login" });
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
