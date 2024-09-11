import { router } from "@inertiajs/react";
import React from "react";

export default function TutupAbsensi({ value, title }) {
    const sumbit = (e) => {
        e.preventDefault();
        router.post(
            route("dosen.tutup_absen", value.kelas_id),
            {
                kelas_id: value.kelas_id,
            },
            {
                onSuccess: () => {
                    window.my_modal_5.close();
                },
            }
        );
    };
    return (
        <dialog
            id="my_modal_5"
            className="modal backdrop-blur-sm backdrop-brightness-75"
        >
            <div className="modal-box w-full max-w-md overflow">
                <div className="w-full flex flex-row justify-between items-center  z-10">
                    <h1 className="text-xl font-bold text-gray-800">
                        {title && title !== "" ? title : value.title}
                    </h1>
                    <button
                        onClick={() => {
                            window.my_modal_5.close();
                        }}
                        className="text-2xl hover:text-gray-400 select-none"
                        aria-label="close modal"
                    >
                        <i className="fas fa-times text-md"></i>
                    </button>
                </div>
                <div className=" w-full flex flex-col gap-5 justify-center py-5">
                    <h1 className="text-lg  text-center">
                        Apakah anda yakin ingin menutup presensi?
                    </h1>
                    <p className="text-sm font-bold text-center">
                        Pertemuan ke-{value.pertemuan}
                    </p>
                    <button
                        onClick={sumbit}
                        className="bg-green1 hover:bg-green1/80 text-white font-bold py-2 px-4 rounded"
                    >
                        Tutup Presensi
                    </button>
                </div>
            </div>
        </dialog>
    );
}
