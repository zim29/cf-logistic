@props([
    'id' => md5(now()),
    'model' => null,
]);

<div wire:ignore>
    <style>
        .stop-scrolling {
            height: 100%;
            overflow: hidden;
        }
    </style>

    <canvas id="{{ $id }}" style="border:1px solid #000;"></canvas>
    <x-button-primary id="clear" label="Limpiar" type="button" fullSize="" />

    <input type="hidden">
</div>

@push('scripts')
    <script>
        /**
         * Initializes the canvas and sets up event listeners for drawing.
         * @param {HTMLCanvasElement} canvas - The canvas element to initialize.
         */
        function initCanvas(canvas) {
            const context = canvas.getContext('2d');
            let isDrawing = false;

            /**
             * Starts the drawing process.
             * @param {MouseEvent|TouchEvent} event - The event that triggered the start of the drawing.
             */
            function startDrawing(event) {
                isDrawing = true;
                document.querySelector('body').classList.add('stop-scrolling');
                context.strokeStyle = "blue";
                context.beginPath();
            }

            /**
             * Draws a line on the canvas based on the current mouse or touch position.
             * @param {MouseEvent|TouchEvent} event - The event that triggered the drawing.
             */
            function draw(event) {
                if (isDrawing) {
                    const position = getCanvasPosition(canvas);
                    document.querySelector('body').classList.add('stop-scrolling');
                    const top = position.top;
                    const left = position.left;
                    context.lineTo(event.clientX - left + window.scrollX, event.clientY - top + window.scrollY);
                    context.stroke();
                }
            }

            /**
             * Stops the drawing process.
             */
            function stopDrawing() {
                if (isDrawing) {
                    document.querySelector('body').classList.remove('stop-scrolling');
                    context.closePath();
                    isDrawing = false;

                    saveSignature();
                }
            }

            /**
             * Gets the position of the canvas on the page.
             * @param {HTMLCanvasElement} canvas - The canvas element to get the position of.
             * @return {Object} An object containing the top and left positions of the canvas.
             */
            function getCanvasPosition(canvas) {
                const rect = canvas.getBoundingClientRect();
                return {
                    top: rect.top + window.scrollY,
                    left: rect.left + window.scrollX
                };
            }

            // Set up event listeners for mouse and touch events
            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseleave', stopDrawing);

            canvas.addEventListener('touchstart', (e) => startDrawing(e.touches[0]));
            canvas.addEventListener('touchmove', (e) => draw(e.touches[0]));
            canvas.addEventListener('touchend', stopDrawing);

            // Set up event listener for the clear button
            document.getElementById('clear').addEventListener('click', () => {
                context.clearRect(0, 0, canvas.width, canvas.height);
                saveSignature();
            });

            // Save the signature
            function saveSignature ()  {
                const dataURL = canvas.toDataURL('image/png');

                @this.set('{{ $model }}', dataURL);
            }
        }

        // Initialize the canvas when the page loads
        document.addEventListener("DOMContentLoaded", () => {
            const canvas = document.getElementById('{{ $id }}');
            initCanvas(canvas);
        });
    </script>
@endpush
