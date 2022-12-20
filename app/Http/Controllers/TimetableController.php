<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Timetable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TimetableController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param int $id_shop
     * @return Application|Factory|View
     */
    public function create(int $id_shop): View|Factory|Application
    {
        $timetable = Timetable::query()
            ->where('shop_id', '=', $id_shop)
            ->get();
        return view('forms.timetable.timetable', [
            'openingHours' => $timetable
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id_shop
     * @param Request $request
     * @return Response
     */
    public function update(int $id_shop, Request $request)
    {
        $openingHours = Timetable::query()
            ->where('shop_id', $id_shop)
            ->get();
        if ($request->getMethod() === "POST" && $request->get('day') !== null) {
            $data = $request->all();
            print_r($data);
            die();
            unset($data['day']);
            $k = 0;
            foreach ($data as $key => $value) {
                $data[$k] = $value;
                unset($data[$key]);
                $k = $k + 1;
            }
            $d = 1;
            dump(count($data));
            dump($data);
            for ($i = 0; $i < count($data); $i+=4) {
                if ($data[$i] !== "" && $data[$i+1] !== "") {
                    [$day, $response] = $this->setOpeningHours($d, $shop, $data, $i);
                    if($response) {
                        return $response;
                    }
                    $this->em->persist($day);
                    $this->em->flush();
                    $shop->addOpeningHour($day);
                } else {
                    [$day, $response] = $this->setOpeningHours($d, $shop, null, $i);
                    if($response) {
                        return $response;
                    }
                    $this->em->persist($day);
                    $this->em->flush();
                    $shop->addOpeningHour($day);
                }
                if($data[$i+2] !== "" && $data[$i+3] !== "") {
                    [$day2, $response] = $this->setOpeningHours($d, $shop, $data, $i+2);
                    if($response) {
                        return $response;
                    }
                    $this->em->persist($day2);
                    $this->em->flush();
                    $shop->addOpeningHour($day2);
                } else {
                    [$day2, $response] = $this->setOpeningHours($d, $shop, null, $i+2);
                    if($response) {
                        return $response;
                    }
                    $this->em->persist($day2);
                    $this->em->flush();
                    $shop->addOpeningHour($day2);
                }
                $d = $d + 1;
            }
            $this->em->flush();
            $this->addFlash('success', 'Les horaires ont bien été modifiés');
        }
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Timetable $timetable
     * @return Response
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
}
