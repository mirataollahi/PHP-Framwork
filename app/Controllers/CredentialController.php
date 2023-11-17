<?php

namespace App\Controllers;

use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ServerErrorException;
use App\Framework\BaseController;
use App\Models\CredentialsModel;
use App\Request\CreateCredentialRequest;
use App\Request\DeleteCredentialRequest;
use App\Request\Request;
use App\Request\UpdateCredentialRequest;
use App\Response\HtmlResponse;
use App\Response\JsonResponse;
use Exception;
use DateTime;

class CredentialController extends BaseController
{


    /**
     * Get credentials json list
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ServerErrorException
     */
    public function index(Request $request): JsonResponse
    {
        try
        {
            $credentials = CredentialsModel::query()
                ->whereNull('deleted_at')
                ->orderByDesc('id')
                ->get();
        }
        catch (Exception $exception)
        {
            throw new ServerErrorException($exception->getMessage());
        }


        return $this->jsonResponse->success($credentials);
    }


    /**
     * Create new credential item with api endpoint
     *
     * @param CreateCredentialRequest $request
     * @return JsonResponse
     * @throws ServerErrorException
     */
    public function create(CreateCredentialRequest $request): JsonResponse
    {
        try
        {
            $credential = CredentialsModel::query()->create([
                'name' => $request->input('name') ,
                'ip' => $request->input('ip'),
                'port' => $request->input('port') ,
                'username' => $request->input('username') ,
                'password' => $request->input('password') ,
                'created_at' => (new DateTime())->getTimestamp()
            ]);
        }
        catch (Exception $exception)
        {
            throw new ServerErrorException($exception->getMessage());
        }
        return $this->jsonResponse->success($credential , 'New Credential Created');

    }


    /**
     * Update credential item with api endpoint
     *
     * @param UpdateCredentialRequest $request
     * @return JsonResponse
     * @throws ServerErrorException
     * @throws ItemNotFoundException
     */
    public function update(UpdateCredentialRequest $request): JsonResponse
    {
        $credential = CredentialsModel::query()
            ->find($request->input('id'));
        if (!$credential) return throw new ItemNotFoundException();

        try
        {
            $updateResult = $credential->update([
                'name' => $request->input('name') ,
                'ip' => $request->input('ip'),
                'port' => $request->input('port') ,
                'username' => $request->input('username') ,
                'password' => $request->input('password') ,
                'updated_at' => (new DateTime())->getTimestamp()
            ]);
        }
        catch (Exception $exception)
        {
            throw new ServerErrorException($exception->getMessage());
        }
        if ($updateResult)
            return $this->jsonResponse->success($credential , "Credentials updated successfully");
        else
            return $this->jsonResponse->fail([] , "Fail to update credential" , 513);

    }


    /**
     * Delete credential item with api endpoint
     *
     * @param DeleteCredentialRequest $request
     * @return JsonResponse
     * @throws ServerErrorException
     * @throws ItemNotFoundException
     */
    public function delete(DeleteCredentialRequest $request): JsonResponse
    {
        $credential = CredentialsModel::query()->find($request->input('id'));
        if (!$credential) return throw new ItemNotFoundException();

        try
        {
             $result = $credential->update(['deleted_at' => (new DateTime)->getTimestamp() ]);
        }
        catch (Exception $exception)
        {
            return throw new ServerErrorException($exception->getMessage());
        }

        if ($result)
            return $this->jsonResponse->success([] , 'Credential deleted successfully');
        else
            return $this->jsonResponse->fail([] , 'Fail to delete credential item');
    }
}