import Api from "./Api";

export default {
  register(form) {
    return Api().post("/register", form);
  },

  login(form) {
    return Api().post("/login", form);
  },

  logout() {
    return Api().post("/logout");
  },

  bookingCreate(form) {
    return Api().post("/booking/create", form);
  },

  getBookingsList() {
    return Api().get("/booking/index");
  },

  bookingsFilter(filter) {
    return Api().get(`/booking/filter/${filter}`);
  },

  auth() {
    return Api().get("/user");
  },
};
