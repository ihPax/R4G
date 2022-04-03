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
                overlay: 'z-40 left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-opacity-60',
                wrapper: 'relative max-w-sm mx-auto -z-10',
                modal: 'bg-white overflow-visible relative rounded',
                body: '',
                header: 'border-b border-black rounded-t font-bold text-center',
                footer: 'rounded-b',
                close: 'flex items-center justify-center rounded-full absolute right-0 top-0 -m-3 w-10 h-10 transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50'
            },
            classes: {
                overlay: 'bg-black',
                wrapper: 'absolute top-1/4 left-0 translate-x-1/2 translate-y-1/2',
                modal: 'mx-3',
                body: 'p-3',
                header: 'p-3 border-gray-100',
                footer: 'p-3 bg-gray-100',
                close: 'bg-gray-100 text-gray-600 hover:bg-gray-200',
                closeIcon: 'fill-current h-6 w-6',
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
                card: {
                    wrapper: 'flex justify-center items-center mt-4', 
                    modal: 'w-2/3',
                    body: 'px-2 py-1 space-x-2',
                    header: 'p-2 border-gray-100',
                    footer: 'p-2 bg-gray-100',
                    close: 'bg-gray-100 text-gray-600 hover:bg-gray-200',
                    closeIcon: 'fill-current h-6 w-6',
                    overlayEnterClass: 'opacity-0',
                    overlayEnterActiveClass: 'transition ease-out duration-100',
                    overlayEnterToClass: 'opacity-100',
                    overlayLeaveClass: 'opacity-100',
                    overlayLeaveActiveClass: 'transition ease-in duration-75',
                    overlayLeaveToClass: 'opacity-0',
                }
            }
        }
    }
    
}

export default vueTailwindSettings