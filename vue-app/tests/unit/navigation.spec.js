import Navigation from "@/components/Navigation.vue";
import { shallowMount } from "@vue/test-utils";

describe("navigation.vue", () => {
  let wrapper;
  beforeEach(() => {
    wrapper = shallowMount(Navigation, {
      methods: { getAuthUser: () => {} },
    });
  });

  it("renders", () => {
    expect(wrapper.exists()).toBe(true);
  });
});
