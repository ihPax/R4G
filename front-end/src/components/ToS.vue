<template>
    <div class="
      font-montserrat
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-full
      flex flex-col
    ">
        <button @click="$router.go(-1)" :disabled="!isMobile" :class="{'cursor-auto': !isMobile}" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <div class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Termini di servizio
            </h3>
        </button>

        <!-- Inserire qui il contenuto del componente! -->

        <div class="p-4">
            <h1 class="font-bold text-lg">Website Terms and Conditions of Use</h1>

            <h2 class="font-semibold">1. Terms</h2>
            <p>By accessing this Website, accessible from {{company.site}}, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.</p>
            
            <h2 class="font-semibold">2. Use License</h2>
            <ul>Permission is granted to temporarily download one copy of the materials on {{company.name}}'s Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</ul>
            <li>modify or copy the materials;</li>
            <li>use the materials for any commercial purpose or for any public display;</li>
            <li>attempt to reverse engineer any software contained on {{company.name}}'s Website;</li>
            <li>remove any copyright or other proprietary notations from the materials; or</li>
            <li>transferring the materials to another person or "mirror" the materials on any other server.</li>
            <p>This will let {{company.name}} to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format.</p>
            
            <h2 class="font-semibold">3. Disclaimer</h2>
            <p>All the materials on {{company.name}}'s Website are provided “as is”. {{company.name}} makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, {{company.name}} does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.</p>
            
            <h2 class="font-semibold">4. Limitations</h2>
            <p>{{company.name}} or its suppliers will not be hold accountable for any damages that will arise with the use or inability to use the materials on {{company.name}}'s Website, even if {{company.name}} or an authorize representative of this Website has been notified, orally or written, of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for incidental damages, these limitations may not apply to you.</p>
            
            <h2 class="font-semibold">5. Revisions and Errata</h2>
            <p>The materials appearing on {{company.name}}'s Website may include technical, typographical, or photographic errors. {{company.name}} will not promise that any of the materials in this Website are accurate, complete, or current. {{company.name}} may change the materials contained on its Website at any time without notice. {{company.name}} does not make any commitment to update the materials.</p>

            <h2 class="font-semibold">6. Links</h2>
            <p>{{company.name}} has not reviewed all of the sites linked to its Website and is not responsible for the contents of any such linked site. The presence of any link does not imply endorsement by {{company.name}} of the site. The use of any linked website is at the user's own risk.</p>
            
            <h2 class="font-semibold">7. Site Terms of Use Modifications</h2>
            <p>{{company.name}} may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.</p>

            <h2 class="font-semibold">8. Governing Law</h2>
            <p>Any claim related to {{company.name}}'s Website shall be governed by the laws of Country without regards to its conflict of law provisions.</p>
        </div>

        <!-- Fine contenuto -->

        <GoBack :isMobile="isMobile"></GoBack>
        <ButtonToTop></ButtonToTop>
    </div> 
</template>

<script>
import ButtonToTop from "@/components/ButtonToTop.vue";
import GoBack from "@/components/GoBack.vue";

export default {
    components: {
        ButtonToTop,
        GoBack
    },
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
            company: {
                name: "Recycle for Globe",
                site: "R4G.com",
            }
        }
    }
}
</script>