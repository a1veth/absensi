import React from "react";

export default function ListMahasiswa({ data }) {
    return (
        <dialog
            id="my_modal_2"
            className="modal backdrop-blur-sm backdrop-brightness-75"
        >
            <div className="modal-box w-full max-w-2xl overflow">
                <div className=" w-full flex flex-col gap-5">
                    <div className="w-full flex flex-row justify-between items-center  z-10">
                        <h1 className="text-2xl font-bold text-green1 mt-1 mb-2">
                            {data?.title}
                        </h1>
                        <button
                            onClick={() => {
                                window.my_modal_2.close();
                            }}
                            className="text-2xl hover:text-gray-400 select-none"
                            aria-label="close modal"
                        >
                            <i className="fas fa-times text-md"></i>
                        </button>
                    </div>
                    <div className="w-full flex flex-col gap-3 max-h-[20rem] overflow-y-auto overflow_type pr-5">
                        {data?.data?.map((item, index) => (
                            <div
                                key={index}
                                className="w-full p-2 border-b flex flex-row justify-between items-center"
                            >
                                <h1 className="text-sm font-bold flex items-center gap-2">
                                    <i className="mr-2 fas fa-user text-md text-gray-600"></i>
                                    {item.user.name}
                                </h1>
                                <h1 className="text-sm mr-5">
                                    {item.nim}
                                </h1>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </dialog>
    );
}
