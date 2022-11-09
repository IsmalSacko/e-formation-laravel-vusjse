import Swal from "sweetalert2";

export function useSwalSuccess(message) {
    Swal.fire({
        toast: true,
        icon: "success",
        title: message,
        animation: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
    });
}

export function useSwalError(message) {
    Swal.fire({
        toast: true,
        icon: "error",
        title: message,
        animation: false,
        position: "top-end",
        showConfirmButton: false,
        timer: 12000,
    });
}

export function useSwalConfirm(message, callback) {

    Swal.fire({
        html: message,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer le!',
        cancelButtonText: 'Non, Fermer.'
    }).then((result) => {
        if (result.isConfirmed) {
            callback()
        } else if (result.isDenied) {
            swal.close()
        }
    })

}

export function useSwalGoBack(message) {
    Swal.fire(message)
}
