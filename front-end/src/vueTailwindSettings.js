import { TButton, TModal } from 'vue-tailwind/dist/components';

const vueTailwindSettings = {
    't-button': {
        component: TButton,
        props: {
            classes: 'button button--moema px-3 py-2 bg-white hover:bg-yellow-600 hover:text-white text-yellow-600 relative border-yellow-500 block focus:outline-none border-2 border-solid rounded-lg text-sm text-center font-semibold tracking-widest disabled:border-gray-400 disabled:cursor-not-allowed disabled:text-gray-400 disabled:bg-white',
        }
    },
    't-button2': {
        component: TButton,
        props: {
            classes: 'button button--moema px-3 py-2 bg-yellow-600 text-white relative border-yellow-100 hover:border-yellow-500 block focus:outline-none border-2 border-solid rounded-lg text-sm text-center font-semibold tracking-widest disabled:bg-gray-400 disabled:border-gray-100 disabled:cursor-not-allowed',
        }
    },
    't-modal': {
      component: TModal,
        props: {
            fixedClasses: {
                overlay: 'z-40 left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-opacity-50',
                wrapper: 'relative mx-auto z-50 max-w-lg px-3 py-6 xs:py-12 justify-center items-center flex',
                    modal: 'overflow-visible relative rounded',
                    body: 'p-3',
                        header: 'border-b border-black p-3 rounded-t font-bold',
                        footer: ' p-3 rounded-b',
                            close: 'flex items-center justify-center rounded-full absolute right-0 top-0 -m-3 h-8 w-8 transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50'
            },
            classes: {
                overlay: 'bg-black',
                wrapper: 'w-screen h-full',
                    modal: 'bg-white w-9/10',
                    body: 'p-3',
                        header: 'border-gray-100',
                        footer: 'bg-gray-100',
                            close: 'bg-gray-100 text-gray-600 hover:bg-gray-200',
                            closeIcon: 'fill-current h-4 w-4',
                                overlayEnterClass: 'opacity-0',
                                overlayEnterActiveClass: 'transition ease-out duration-100',
                                    overlayEnterToClass: 'opacity-100',
                                    overlayLeaveClass: 'opacity-100',
                                        overlayLeaveActiveClass: 'transition ease-in duration-75',
                                        overlayLeaveToClass: 'opacity-0',
                                            enterClass: '',
                                            enterActiveClass: '',
                                                enterToClass: '',
                                                leaveClass: '',
                                                    leaveActiveClass: '',
                                                    leaveToClass: ''
            },
            variants: {
                danger: {
                overlay: 'bg-red-100',
                    header: 'border-red-50 text-red-700',
                    modal: 'bg-white border border-red-100 shadow-lg',
                        footer: 'bg-red-50'
                }
            }
        }
    }
    
}

export default vueTailwindSettings