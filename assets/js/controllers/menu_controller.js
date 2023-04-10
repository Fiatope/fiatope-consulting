import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    connect() {
        const toggle = this.element.querySelector('.toggle-menu')

        toggle.addEventListener('click', () => {
            this.element.classList.toggle('active')
        })
    }
}
