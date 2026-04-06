@extends('doctor.layouts.app')
@section('content')
        <div
                class="w-full flex items-center justify-between pb-4 border-b border-gray-300"
              >
                <h4
                  class="md:text-[1.5vw] sm:text-[2.5vw] xs:text-[4vw] font-semibold"
                >
                  Reviews
                </h4>
              </div>
              <div
                class="md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] border border-gray-300 rounded-md flex flex-wrap gap-2 items-center xs:justify-center md:justify-between"
              >
                <div class="flex flex-col">
                  <h4
                    class="md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw] font-semibold"
                  >
                    Overall Rattings
                  </h4>
                  <div class="flex items-center gap-4">
                    <h4
                      class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold"
                    >
                      4.0
                    </h4>
                    <div
                      class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]"
                    >
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-gray-300"></i>
                    </div>
                  </div>
                </div>
                <div
                  class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] px-4 flex items-center gap-2 border border-[#e6e8ee] rounded-md md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500"
                >
                  <svg
                    class="md:w-[1.2vw] sm:w-[3.2vw] xs:w-[5.2vw]"
                    viewBox="0 0 14 15"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M4.32812 3.45801C4.19271 3.45801 4.07552 3.40853 3.97656 3.30957C3.8776 3.21061 3.82812 3.09342 3.82812 2.95801V0.958008C3.82812 0.822591 3.8776 0.705403 3.97656 0.606445C4.07552 0.507487 4.19271 0.458008 4.32812 0.458008C4.46354 0.458008 4.58073 0.507487 4.67969 0.606445C4.77865 0.705403 4.82812 0.822591 4.82812 0.958008V2.95801C4.82812 3.09342 4.77865 3.21061 4.67969 3.30957C4.58073 3.40853 4.46354 3.45801 4.32812 3.45801ZM9.67188 3.45801C9.53646 3.45801 9.41927 3.40853 9.32031 3.30957C9.22135 3.21061 9.17188 3.09342 9.17188 2.95801V0.958008C9.17188 0.822591 9.22135 0.705403 9.32031 0.606445C9.41927 0.507487 9.53646 0.458008 9.67188 0.458008C9.80729 0.458008 9.92448 0.507487 10.0234 0.606445C10.1224 0.705403 10.1719 0.822591 10.1719 0.958008V2.95801C10.1719 3.09342 10.1224 3.21061 10.0234 3.30957C9.92448 3.40853 9.80729 3.45801 9.67188 3.45801ZM4.67188 9.30176C4.63021 9.30176 4.58594 9.29655 4.53906 9.28613C4.49219 9.27572 4.44792 9.26009 4.40625 9.23926C4.36458 9.22884 4.32812 9.21061 4.29688 9.18457C4.26562 9.15853 4.22917 9.12988 4.1875 9.09863C4.13542 9.03613 4.09115 8.96582 4.05469 8.8877C4.01823 8.80957 4 8.72363 4 8.62988C4 8.58822 4.00521 8.54655 4.01562 8.50488C4.02604 8.46322 4.03646 8.42155 4.04688 8.37988C4.06771 8.33822 4.08854 8.29915 4.10938 8.2627C4.13021 8.22624 4.15625 8.19238 4.1875 8.16113C4.22917 8.12988 4.26562 8.10124 4.29688 8.0752C4.32812 8.04915 4.36458 8.03092 4.40625 8.02051C4.53125 7.96842 4.66146 7.9554 4.79688 7.98145C4.93229 8.00749 5.04688 8.06738 5.14062 8.16113C5.20312 8.22363 5.25 8.29655 5.28125 8.37988C5.3125 8.46322 5.32812 8.54655 5.32812 8.62988C5.32812 8.65072 5.32812 8.67155 5.32812 8.69238C5.32812 8.71322 5.32292 8.73926 5.3125 8.77051C5.3125 8.78092 5.3099 8.79655 5.30469 8.81738C5.29948 8.83822 5.29167 8.85905 5.28125 8.87988C5.27083 8.90072 5.26042 8.92155 5.25 8.94238C5.23958 8.96322 5.22917 8.98405 5.21875 9.00488C5.20833 9.0153 5.19531 9.03092 5.17969 9.05176C5.16406 9.07259 5.15104 9.08822 5.14062 9.09863C5.07812 9.16113 5.00521 9.21061 4.92188 9.24707C4.83854 9.28353 4.75521 9.30176 4.67188 9.30176ZM7 9.30176C6.95833 9.30176 6.91667 9.29655 6.875 9.28613C6.83333 9.27572 6.79167 9.26009 6.75 9.23926C6.70833 9.22884 6.66927 9.21061 6.63281 9.18457C6.59635 9.15853 6.5625 9.12988 6.53125 9.09863C6.46875 9.03613 6.41927 8.96582 6.38281 8.8877C6.34635 8.80957 6.32812 8.72363 6.32812 8.62988C6.32812 8.58822 6.33333 8.54655 6.34375 8.50488C6.35417 8.46322 6.36979 8.42155 6.39062 8.37988C6.40104 8.33822 6.41927 8.29915 6.44531 8.2627C6.47135 8.22624 6.5 8.19238 6.53125 8.16113C6.5625 8.12988 6.59635 8.10124 6.63281 8.0752C6.66927 8.04915 6.70833 8.03092 6.75 8.02051C6.86458 7.96842 6.98958 7.9554 7.125 7.98145C7.26042 8.00749 7.375 8.06738 7.46875 8.16113C7.53125 8.22363 7.58073 8.29655 7.61719 8.37988C7.65365 8.46322 7.67188 8.54655 7.67188 8.62988C7.67188 8.65072 7.66927 8.67155 7.66406 8.69238C7.65885 8.71322 7.65625 8.73926 7.65625 8.77051C7.64583 8.78092 7.63802 8.79655 7.63281 8.81738C7.6276 8.83822 7.61979 8.85905 7.60938 8.87988C7.60938 8.90072 7.60417 8.92155 7.59375 8.94238C7.58333 8.96322 7.56771 8.98405 7.54688 9.00488C7.53646 9.0153 7.52604 9.03092 7.51562 9.05176C7.50521 9.07259 7.48958 9.08822 7.46875 9.09863C7.40625 9.16113 7.33333 9.21061 7.25 9.24707C7.16667 9.28353 7.08333 9.30176 7 9.30176ZM9.32812 9.30176C9.28646 9.30176 9.24479 9.29655 9.20312 9.28613C9.16146 9.27572 9.11979 9.26009 9.07812 9.23926C9.03646 9.22884 8.9974 9.21061 8.96094 9.18457C8.92448 9.15853 8.89062 9.12988 8.85938 9.09863C8.84896 9.08822 8.83594 9.07259 8.82031 9.05176C8.80469 9.03092 8.79167 9.0153 8.78125 9.00488C8.77083 8.98405 8.76042 8.96322 8.75 8.94238C8.73958 8.92155 8.72917 8.90072 8.71875 8.87988C8.70833 8.85905 8.70052 8.83822 8.69531 8.81738C8.6901 8.79655 8.6875 8.78092 8.6875 8.77051C8.67708 8.73926 8.67188 8.71322 8.67188 8.69238C8.67188 8.67155 8.67188 8.65072 8.67188 8.62988C8.67188 8.54655 8.6875 8.46322 8.71875 8.37988C8.75 8.29655 8.79688 8.22363 8.85938 8.16113C8.89062 8.12988 8.92448 8.10124 8.96094 8.0752C8.9974 8.04915 9.03646 8.03092 9.07812 8.02051C9.20312 7.96842 9.33333 7.9554 9.46875 7.98145C9.60417 8.00749 9.71875 8.06738 9.8125 8.16113C9.86458 8.22363 9.90885 8.29655 9.94531 8.37988C9.98177 8.46322 10 8.54655 10 8.62988C10 8.65072 9.9974 8.67155 9.99219 8.69238C9.98698 8.71322 9.98438 8.73926 9.98438 8.77051C9.98438 8.78092 9.98177 8.79655 9.97656 8.81738C9.97135 8.83822 9.96354 8.85905 9.95312 8.87988C9.94271 8.90072 9.93229 8.92155 9.92188 8.94238C9.91146 8.96322 9.90104 8.98405 9.89062 9.00488C9.88021 9.0153 9.86719 9.03092 9.85156 9.05176C9.83594 9.07259 9.82292 9.08822 9.8125 9.09863C9.75 9.16113 9.67708 9.21061 9.59375 9.24707C9.51042 9.28353 9.42188 9.30176 9.32812 9.30176ZM4.67188 11.6299C4.63021 11.6299 4.58594 11.6247 4.53906 11.6143C4.49219 11.6038 4.44792 11.5934 4.40625 11.583C4.375 11.5622 4.34115 11.5413 4.30469 11.5205C4.26823 11.4997 4.22917 11.4736 4.1875 11.4424C4.13542 11.3799 4.09115 11.307 4.05469 11.2236C4.01823 11.1403 4 11.0518 4 10.958C4 10.9163 4.00521 10.8747 4.01562 10.833C4.02604 10.7913 4.03646 10.7497 4.04688 10.708C4.06771 10.6663 4.08854 10.6273 4.10938 10.5908C4.13021 10.5544 4.15625 10.5205 4.1875 10.4893C4.3125 10.3643 4.47135 10.3018 4.66406 10.3018C4.85677 10.3018 5.01562 10.3643 5.14062 10.4893C5.20312 10.5518 5.25 10.6247 5.28125 10.708C5.3125 10.7913 5.32812 10.8747 5.32812 10.958C5.32812 11.0518 5.3125 11.1403 5.28125 11.2236C5.25 11.307 5.20312 11.3799 5.14062 11.4424C5.07812 11.4945 5.00521 11.5387 4.92188 11.5752C4.83854 11.6117 4.75521 11.6299 4.67188 11.6299ZM7 11.6299C6.91667 11.6299 6.83333 11.6117 6.75 11.5752C6.66667 11.5387 6.59375 11.4945 6.53125 11.4424C6.46875 11.3799 6.41927 11.307 6.38281 11.2236C6.34635 11.1403 6.32812 11.0518 6.32812 10.958C6.32812 10.9163 6.33333 10.8747 6.34375 10.833C6.35417 10.7913 6.36979 10.7497 6.39062 10.708C6.40104 10.6663 6.41927 10.6273 6.44531 10.5908C6.47135 10.5544 6.5 10.5205 6.53125 10.4893C6.65625 10.3643 6.8125 10.3018 7 10.3018C7.1875 10.3018 7.34375 10.3643 7.46875 10.4893C7.5 10.5205 7.52865 10.5544 7.55469 10.5908C7.58073 10.6273 7.59896 10.6663 7.60938 10.708C7.63021 10.7497 7.64583 10.7913 7.65625 10.833C7.66667 10.8747 7.67188 10.9163 7.67188 10.958C7.67188 11.0518 7.65365 11.1403 7.61719 11.2236C7.58073 11.307 7.53125 11.3799 7.46875 11.4424C7.40625 11.4945 7.33333 11.5387 7.25 11.5752C7.16667 11.6117 7.08333 11.6299 7 11.6299ZM9.32812 11.6299C9.24479 11.6299 9.16146 11.6117 9.07812 11.5752C8.99479 11.5387 8.92188 11.4945 8.85938 11.4424C8.82812 11.4111 8.80208 11.3773 8.78125 11.3408C8.76042 11.3044 8.73958 11.2653 8.71875 11.2236C8.69792 11.182 8.6849 11.1377 8.67969 11.0908C8.67448 11.0439 8.67188 10.9997 8.67188 10.958C8.67188 10.9163 8.67448 10.8747 8.67969 10.833C8.6849 10.7913 8.69792 10.7497 8.71875 10.708C8.73958 10.6663 8.76042 10.6273 8.78125 10.5908C8.80208 10.5544 8.82812 10.5205 8.85938 10.4893C8.93229 10.4163 9.02344 10.3617 9.13281 10.3252C9.24219 10.2887 9.34896 10.2861 9.45312 10.3174C9.48438 10.3174 9.51042 10.32 9.53125 10.3252C9.55208 10.3304 9.57292 10.3382 9.59375 10.3486C9.60417 10.359 9.61979 10.3695 9.64062 10.3799C9.66146 10.3903 9.68229 10.4007 9.70312 10.4111C9.72396 10.4215 9.74219 10.4346 9.75781 10.4502C9.77344 10.4658 9.79167 10.4788 9.8125 10.4893C9.86458 10.5518 9.90885 10.6247 9.94531 10.708C9.98177 10.7913 10 10.8747 10 10.958C10 11.0518 9.98177 11.1403 9.94531 11.2236C9.90885 11.307 9.86458 11.3799 9.8125 11.4424C9.75 11.4945 9.67708 11.5387 9.59375 11.5752C9.51042 11.6117 9.42188 11.6299 9.32812 11.6299ZM12.6719 6.19238H1.32812C1.19271 6.19238 1.07552 6.1429 0.976562 6.04395C0.877604 5.94499 0.828125 5.8278 0.828125 5.69238C0.828125 5.55697 0.877604 5.43978 0.976562 5.34082C1.07552 5.24186 1.19271 5.19238 1.32812 5.19238H12.6719C12.8073 5.19238 12.9245 5.24186 13.0234 5.34082C13.1224 5.43978 13.1719 5.55697 13.1719 5.69238C13.1719 5.8278 13.1224 5.94499 13.0234 6.04395C12.9245 6.1429 12.8073 6.19238 12.6719 6.19238ZM9.67188 14.8018H4.32812C3.72396 14.8018 3.18229 14.7132 2.70312 14.5361C2.23438 14.3695 1.83594 14.1221 1.50781 13.7939C1.17969 13.4658 0.927083 13.0622 0.75 12.583C0.583333 12.1143 0.5 11.5726 0.5 10.958V5.30176C0.5 4.68717 0.583333 4.14551 0.75 3.67676C0.927083 3.19759 1.17969 2.79395 1.50781 2.46582C1.83594 2.1377 2.23438 1.8903 2.70312 1.72363C3.18229 1.54655 3.72396 1.45801 4.32812 1.45801H9.67188C10.276 1.45801 10.8177 1.54655 11.2969 1.72363C11.7656 1.8903 12.1641 2.1377 12.4922 2.46582C12.8203 2.79395 13.0729 3.19759 13.25 3.67676C13.4167 4.14551 13.5 4.68717 13.5 5.30176V10.958C13.5 11.5726 13.4167 12.1143 13.25 12.583C13.0729 13.0622 12.8203 13.4658 12.4922 13.7939C12.1641 14.1221 11.7656 14.3695 11.2969 14.5361C10.8177 14.7132 10.276 14.8018 9.67188 14.8018ZM4.32812 2.45801C3.38021 2.45801 2.67188 2.69238 2.20312 3.16113C1.73438 3.62988 1.5 4.34342 1.5 5.30176V10.958C1.5 11.9163 1.73438 12.6299 2.20312 13.0986C2.67188 13.5674 3.38021 13.8018 4.32812 13.8018H9.67188C10.6198 13.8018 11.3281 13.5674 11.7969 13.0986C12.2656 12.6299 12.5 11.9163 12.5 10.958V5.30176C12.5 4.34342 12.2656 3.62988 11.7969 3.16113C11.3281 2.69238 10.6198 2.45801 9.67188 2.45801H4.32812Z"
                      fill="black"
                    />
                  </svg>
                  <span>05/17/2025 - 05/23/2025</span>
                </div>
              </div>
              <div
                class="flex flex-col gap-5 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] overflow-y-auto"
              >
                <div class="border border-gray-300 rounded-md">
                  <div
                    class="w-full flex items-center justify-between md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] border-b border-gray-200"
                  >
                    <div class="flex items-center gap-2">
                      <div
                        class="md:w-[3vw] md:h-[3vw] sm:w-[5vw] sm:h-[5vw] xs:w-[7vw] xs:h-[7vw] overflow-hidden rounded-md shrink-0"
                      >
                        <img
                          src="../images/doctor-dashboard/oppointmenters.png"
                          class="w-full h-full object-cover"
                          alt=""
                        />
                      </div>
                      <div class="w-full">
                        <h4 class="font-semibold">Adrine</h4>
                        <p
                          class="md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-gray-500"
                        >
                          15 Mar 2024
                        </p>
                      </div>
                    </div>
                    <div
                      class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]"
                    >
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-gray-300"></i>
                    </div>
                  </div>
                  <div
                    class="md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col gap-2"
                  >
                    <p class="text-gray-500">
                      Dr. Edalin Hendry has been my family's trusted doctor for
                      years. Their genuine care and thorough approach to our
                      health concerns make every visit reassuring. Dr. Edalin
                      Hendry's ability to listen and explain complex health
                      issues in understandable terms is exceptional. We are
                      grateful to have such a dedicated physician by our side
                    </p>
                    <div
                      class="flex items-center gap-2 md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]"
                    >
                      <i class="fa-solid fa-share rotate-y-180"></i>
                      <p>Reply</p>
                    </div>
                  </div>
                </div>
                <div class="border border-gray-300 rounded-md">
                  <div
                    class="w-full flex items-center justify-between md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] border-b border-gray-200"
                  >
                    <div class="flex items-center gap-2">
                      <div
                        class="md:w-[3vw] md:h-[3vw] sm:w-[5vw] sm:h-[5vw] xs:w-[7vw] xs:h-[7vw] overflow-hidden rounded-md shrink-0"
                      >
                        <img
                          src="../images/doctor-dashboard/oppointmenters.png"
                          class="w-full h-full object-cover"
                          alt=""
                        />
                      </div>
                      <div class="w-full">
                        <h4 class="font-semibold">Adrine</h4>
                        <p
                          class="md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-gray-500"
                        >
                          15 Mar 2024
                        </p>
                      </div>
                    </div>
                    <div
                      class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]"
                    >
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-gray-300"></i>
                    </div>
                  </div>
                  <div
                    class="md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col gap-2"
                  >
                    <p class="text-gray-500">
                      Dr. Edalin Hendry has been my family's trusted doctor for
                      years. Their genuine care and thorough approach to our
                      health concerns make every visit reassuring. Dr. Edalin
                      Hendry's ability to listen and explain complex health
                      issues in understandable terms is exceptional. We are
                      grateful to have such a dedicated physician by our side
                    </p>
                    <div
                      class="flex items-center gap-2 md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]"
                    >
                      <i class="fa-solid fa-share rotate-y-180"></i>
                      <p>Reply</p>
                    </div>
                  </div>
                </div>
                <div class="border border-gray-300 rounded-md">
                  <div
                    class="w-full flex items-center justify-between md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] border-b border-gray-200"
                  >
                    <div class="flex items-center gap-2">
                      <div
                        class="md:w-[3vw] md:h-[3vw] sm:w-[5vw] sm:h-[5vw] xs:w-[7vw] xs:h-[7vw] overflow-hidden rounded-md shrink-0"
                      >
                        <img
                          src="../images/doctor-dashboard/oppointmenters.png"
                          class="w-full h-full object-cover"
                          alt=""
                        />
                      </div>
                      <div class="w-full">
                        <h4 class="font-semibold">Adrine</h4>
                        <p
                          class="md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-gray-500"
                        >
                          15 Mar 2024
                        </p>
                      </div>
                    </div>
                    <div
                      class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]"
                    >
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-gray-300"></i>
                    </div>
                  </div>
                  <div
                    class="md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col gap-2"
                  >
                    <p class="text-gray-500">
                      Dr. Edalin Hendry has been my family's trusted doctor for
                      years. Their genuine care and thorough approach to our
                      health concerns make every visit reassuring. Dr. Edalin
                      Hendry's ability to listen and explain complex health
                      issues in understandable terms is exceptional. We are
                      grateful to have such a dedicated physician by our side
                    </p>
                    <div
                      class="flex items-center gap-2 md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]"
                    >
                      <i class="fa-solid fa-share rotate-y-180"></i>
                      <p>Reply</p>
                    </div>
                  </div>
                </div>
                <div class="border border-gray-300 rounded-md">
                  <div
                    class="w-full flex items-center justify-between md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] border-b border-gray-200"
                  >
                    <div class="flex items-center gap-2">
                      <div
                        class="md:w-[3vw] md:h-[3vw] sm:w-[5vw] sm:h-[5vw] xs:w-[7vw] xs:h-[7vw] overflow-hidden rounded-md shrink-0"
                      >
                        <img
                          src="../images/doctor-dashboard/oppointmenters.png"
                          class="w-full h-full object-cover"
                          alt=""
                        />
                      </div>
                      <div class="w-full">
                        <h4 class="font-semibold">Adrine</h4>
                        <p
                          class="md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-gray-500"
                        >
                          15 Mar 2024
                        </p>
                      </div>
                    </div>
                    <div
                      class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]"
                    >
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-yellow-500"></i>
                      <i class="fa-solid fa-star text-gray-300"></i>
                    </div>
                  </div>
                  <div
                    class="md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col gap-2"
                  >
                    <p class="text-gray-500">
                      Dr. Edalin Hendry has been my family's trusted doctor for
                      years. Their genuine care and thorough approach to our
                      health concerns make every visit reassuring. Dr. Edalin
                      Hendry's ability to listen and explain complex health
                      issues in understandable terms is exceptional. We are
                      grateful to have such a dedicated physician by our side
                    </p>
                    <div
                      class="flex items-center gap-2 md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]"
                    >
                      <i class="fa-solid fa-share rotate-y-180"></i>
                      <p>Reply</p>
                    </div>
                  </div>
                </div>
              </div>
          
@endsection